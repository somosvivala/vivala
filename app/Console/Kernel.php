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

        $schedule->call(function() {
            //Pegando as exps ativas e finalizadas para contemplar todo o fluxo das experiencias
            $experienciasAtivasOuFinalizadas= Experiencia::ativasOuFinalizadas()->get();

            //iterando sob as experiencias ativas ou finalizadas
            foreach ($experienciasAtivasOuFinalizadas as $Experiencia) {
                //pegando as datas em que a experiencia vai ocorrer
                $datasOcorrenciaExperiencia = $Experiencia->ocorrencias;

                //Para cada data de ocorrencia
                foreach ($datasOcorrenciaExperiencia as $DataOcorrenciaExperiencia) {

                    //Pré-experiencia
                    if ($DataOcorrenciaExperiencia->aconteceEmQuatroDias) {
                        //Disparando evento para tomar as acoes necessarias
                        event (new ExperienciaEminente($Experiencia, $DataOcorrenciaExperiencia));
                    }

                    //Dia da Experiencia
                    if ($DataOcorrenciaExperiencia->aconteceHoje) {
                        //Disparando evento para tomar as acoes necessarias
                        event (new ExperienciaAconteceHoje($Experiencia, $DataOcorrenciaExperiencia));
                    }

                    //Pós-experiencia
                    if ($DataOcorrenciaExperiencia->aconteceuFazDoisDias) {
                        //Disparando evento para tomar as acoes necessarias
                        event (new ExperienciaAconteceuRecentemente($Experiencia, $DataOcorrenciaExperiencia));
                    }
                }

            }
        })->dailyAt('4:19');

        //Fazendo refresh dos places e buscompanies da Clickbus diariamente
        $schedule->exec('php artisan db:seed --class="ClickBusSeeder" --force')->dailyAt('4:25');

    }
}
