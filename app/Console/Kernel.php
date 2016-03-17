<?php namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Repositories\ClickBusRepository;

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
                // Testar se existe compra da clickbus com status pendente
                $compras = DB::table('compra_clickbuses')->where('pagamento_confirmado',false)->get();

                // Caso exista alguma compra pendente
                if($compras->count() > 0) {
                
                    foreach($compras as $Compra) {
                        // Consulta na clickbus das compras com status pendente
                        ClickBusRepository::getOrder($Compra->id);

                        // Caso tenha mudado de pendente para confirmado chama
                        // evento de pagamento confirmado (atualiza no
                        // bd e envia email)
                        event(new ClickBusPagamentoConfirmado($Compra, "confirmado"));
                        
                    }

                }
            })->everyTenMinutes();
	}

}
