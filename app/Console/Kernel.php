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
            $experiencias = Experiencia::publicadas()->get();


            //iterando sob as experiencias publicadas
            foreach ($experiencias as $Experiencia) {

                //pegando as datas em que a experiencia vai ocorrer
                $datasOcorrenciaExperiencia = $Experiencia->ocorrencias;

                //Para cada data de ocorrencia
                foreach ($datasOcorrenciaExperiencia as $DataOcorrenciaExperiencia) {

                    $dataFormatada = $DataOcorrenciaExperiencia->data_ocorrencia->format('Y-m-d');

                    //Pré-experiencia
                    if ($DataOcorrenciaExperiencia->aconteceEmQuatroDias) {

                        //Pegando as inscricoes ativas para esse dia (inscricoes pendentes + confirmadas)
                        $inscricoesAtivasNessaData = $Experiencia->inscricoes()->ativas()
                            ->where('data_ocorrencia_experiencia', $dataFormatada)
                            ->get();

                        //Pegando as inscricoes confirmadas para esse dia
                        $inscricoesConfirmadasNessaData = $Experiencia->inscricoes()->confirmadas()
                            ->where('data_ocorrencia_experiencia', $dataFormatada)
                            ->get();

                        //Iterando sob os inscritos disparando o email conforme o status da inscricao
                        foreach ($inscricoesAtivasNessaData as $Inscricao) {
                            //Se a inscricao tiver sido confirmada
                            if($Inscricao->isConfirmada) {
                                //$this->mailSenderRepository->envia email experiencia eminente p/ inscricao confirmada
                            }
                            else if ($Inscricao->isPendente) {
                                //$this->mailSenderRepository->envia email experiencia eminente p/ inscricao pendente
                            }
                        }

                        //3-Disparar email de experiecia eminente para o owner com a lista de inscritos confirmados
                        //$this->mailSenderRepository-> envia email experiencia eminente p/ Owner ($inscricoesConfirmadasNessaData)
                    }

                    //Checar se a data atual é um dia de ocorrencia da experiencia (== dia de ocorrencia)
                    if ($DataOcorrenciaExperiencia->aconteceHoje) {
                        //Pegando as inscricoes confirmadas para esse dia
                        $inscricoesConfirmadasNessaData = $Experiencia->inscricoes()->confirmadas()
                            ->where('data_ocorrencia_experiencia', $dataFormatada)
                            ->get();

                        //2-Iterar sob os inscritos disparando o email avisando sobre a ocorencia da experiencia
                        foreach ($inscricoesConfirmadasNessaData as $Inscricao) {
                            //$this-mailSenderRepository->envia email dia da experiencia p/ candidato
                        }

                        //3-Disparar email de experiecia eminente para o owner com a lista de inscritos confirmados
                        //$this->mailSenderRepository-> envia email dia da experiencia p/ Owner ($inscricoesConfirmadasNessaData)

                        //4-Disparar email para a vivalá notificando a ocorrencia da experiencia,
                        //$this->mailSenderRepository-> envia email dia da experiencia p/ Vivalá ($inscricoesConfirmadasNessaData)

                        //5-Atualizar lista de inscricoes (confirmadas -> concluidas)
                        $this->experienciasRepository->atualizaInscricoesConfirmadas($inscricoesConfirmadasNessaData);

                        //6-Atualizar status da experiencia caso tipo evento_unico status -> concluida
                        $this->experienciasRepository->finalizaExperienciaEventoUnico($Experiencia);

                    }

                    // * Quando as inscriçṍes são interrompidas pra determinada experiencia? Podiamos setar umas 12 horas antes e pendentes -> expiradas ?


                    //Checar se a data atual é pós experiencia (== 2 dias após acontecer)
                    //Se estiver no pós-experiencia
                    //1-Pegar inscritos concluidos desse dia
                    //2-Iterar sob os inscritos disparando o email de feedback/agradecimentos aos candidatos
                    //3-Disparar email de feedback para o owner

                }
            }
        })->dailyAt('4:19');

        //Fazendo refresh dos places e buscompanies da Clickbus diariamente
        $schedule->exec('php artisan db:seed --class="ClickBusSeeder" --force')->dailyAt('4:25');

    }
}
