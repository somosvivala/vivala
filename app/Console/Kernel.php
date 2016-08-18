<?php namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Repositories\ClickBusRepository;
use App\Events\ClickBusPagamentoConfirmado;
use App\Events\ClickBusPassagemCancelada;
use Carbon\Carbon;
use App\CompraClickbus;

use App\Events\Experiencias\ExperienciaEminente;
use App\Events\Experiencias\ExperienciaOcorrendo;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\Inspire',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //Diminuindo relevancia dos posts a cada hora
        $schedule->call(function() {
            DB::table('posts')->where('relevancia','>',5)->decrement('relevancia', 5);
            DB::table('posts')->where('relevancia_rate','>',100)->decrement('relevancia_rate', 'relevancia_rate/100');
        })->hourly();

        //decrementando a taxa de relevancia?
        $schedule->call(function() {
            DB::table('posts')->where('relevancia_rate','>',5)->decrement('relevancia_rate', 1);
        })->daily();

        //Checando se existem compras pendentes da ClickBus
        $schedule->call(function() {

            $clickBusRepository = new ClickBusRepository();

            //pegando todas as compras que nao foram canceladas ou ja realizadas
            $compras = CompraClickbus::whereHas('poltronas', function($query){
                //pegando as passagens em que a poltronas tiverem departure time maior que 3 horas adiante
                $query->where('departure_time', '>=', Carbon::now('America/Sao_Paulo'));

            })->where('status', '!=', $clickBusRepository->FLAG_PASSAGEM_CANCELADA)->get();

            // Caso exista alguma compra pendente
            if($compras->count() > 0) {

                foreach($compras as $Compra) {

                    //Obtendo os details dessa compra pendente
                    $respostaClickbus = $clickBusRepository->getOrder($Compra->clickbus_order_id);

                    //Se pagamento confirmado, disparar evento para tomar as medidas necessarias
                    if ($clickBusRepository->confirmaPagamentoFinalizado($Compra, $respostaClickbus)) {
                        event(new ClickBusPagamentoConfirmado($Compra));
                    }

                    //Se a passagem foi cancelada, disparar evento para tomar as medidas necessarias
                    if ($clickBusRepository->confirmaPassagemCancelada($respostaClickbus)) {
                        event(new ClickBusPassagemCancelada($Compra));
                    }
                }
            }
        })->everyFiveMinutes();


        /**
         * Jobs referentes as experiencias
         */

        //Job do fluxo de uma experiencia
        $schedule->call(function() {

            //Pré-experiencia
            $experiencias = Experiencia::publicadas()->get();

            //iterando sob as experiencias publicadas
            foreach ($experiencias as $Experiencia) {

                //pegando as datas em que a experiencia vai ocorrer
                $datasOcorrenciaExperiencia = $Experiencia->ocorrencias;

                //Para cada data de ocorrencia
                foreach ($datasOcorrenciaExperiencia as $DataOcorrenciaExperiencia) {

                    //Checar se essa data atual é pré-experiencia (== 4 dias p/ acontecer)
                    //Se estiver no pré-experiencia:
                    //1-Pegar os inscritos para esse dia
                    //2-Iterar sob inscritos disparando o email conforme o tipo da inscricao (pendente x confirmada)
                    //3-Disparar email de experiecia eminente para o owner

                    //Checar se a data atual é um dia de ocorrencia da experiencia (== dia de ocorrencia)
                    //Se for um dia de ocorrencia
                    //1-Pegar inscritos confirmados para esse dia
                    //2-Iterar sob os inscritos disparando o email avisando sobre a ocorencia da experiencia?
                    //3-Disparar email com lista de inscritos confirmados para o owner
                    //4-Disparar email para a vivalá notificando a ocorrencia da experiencia
                    //5-Atualizar lista de inscricoes (confirmadas -> concluidas && pendentes -> expiradas && canceladas -> expiradas?)
                    //6-Atualizar status da experiencia caso tipo evento_unico status -> concluida (**problema, a experiencia nao estaria nessa query para o pós experiencia)

                    //Checar se a data atual é pós experiencia (== 2 dias após acontecer)
                    //Se estiver no pós-experiencia
                    //1-Pegar inscritos concluidos desse dia
                    //2-Iterar sob os inscritos disparando o email de feedback dos candidatos
                    //3-Disparar email de feedback para o owner

                }
            }
        })->dailyAt('4:19');

        //Fazendo refresh dos places e buscompanies da Clickbus diariamente
        $schedule->exec('php artisan db:seed --class="ClickBusSeeder" --force')->dailyAt('4:25');

    }
}
