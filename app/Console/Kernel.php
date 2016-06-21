<?php namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Repositories\ClickBusRepository;
use App\Events\ClickBusPagamentoConfirmado;
use App\Events\ClickBusPassagemCancelada;
use Carbon\Carbon;
use App\CompraClickbus;

class Kernel extends ConsoleKernel {

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
            $schedule->call(function() {
                DB::table('posts')->where('relevancia','>',5)->decrement('relevancia', 5);
                DB::table('posts')->where('relevancia_rate','>',100)->decrement('relevancia_rate', 'relevancia_rate/100');
            })->hourly();

            $schedule->call(function() {
                DB::table('posts')->where('relevancia_rate','>',5)->decrement('relevancia_rate', 1);
            })->daily();

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

            //job para atualizar as inscricoes de uma experiencias que ocorre
            $schedule->call(function() {

                //dentre as experiencias ativas com data marcada
                Experiencia::publicadas()->comDataMarcada()->get()->each(function ($experiencia) {

                    //se a experiencia for acontecer hoje, disparar evento para tomar providencias
                    if ($experiencia->aconteceHoje) {
                        event( new ExperienciaOcorrendo( $experiencia ));
                    }

                    //se a experiencia for acontecer daqui 3 dias (eminente), disparar evento para tomar providencias
                    if ($experiencia->aconteceEmTresDias) {
                        //event( new ExperienciaEminente( $experiencia ));
                    }

                });;




            })->dailyAt('4:19');

	}

}
