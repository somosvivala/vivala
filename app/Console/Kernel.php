<?php namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Repositories\ClickBusRepository;
use App\Events\ClickBusPagamentoConfirmado;
use App\Events\ClickBusPassagemCancelada;

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

                //pegando todas as compras com status pendente
                $compras = CompraClickbus::where('status', ClickBusRepository::$FLAG_PAGAMENTO_PENDENTE)->get();

                // Caso exista alguma compra pendente
                if($compras->count() > 0) {

                    foreach($compras as $Compra) {

                        //Obtendo os details dessa compra pendente
                        $respostaClickbus = ClickBusRepository::getOrder($Compra->clickbus_order_id);

                        //Se pagamento confirmado, disparar evento para tomar as medidas necessarias
                        if (ClickbusRepository::confirmaPagamentoFinalizado($respostaClickbus)) {
                            event(new ClickBusPagamentoConfirmado($Compra));
                        }

                        //Se a passagem foi cancelada, disparar evento para tomar as medidas necessarias
                        if (ClickbusRepository::confirmaPassagemCancelada($respostaClickbus)) {
                            event(new ClickBusPassagemCancelada($Compra));
                        }

                        if ($Compra->id == 2) {
                            event(new ClickBusPagamentoConfirmado($Compra));
                        }

                    }

                }
            })->everyFiveMinutes();
	}

}
