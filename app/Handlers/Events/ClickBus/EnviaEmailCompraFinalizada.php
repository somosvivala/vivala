<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusCompraFinalizada;
use App\Repositories\ClickBusRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class EnviaEmailCompraFinalizada {

    private $repository;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(ClickBusRepository $repository)
	{
		$this->clickBusRepository = $repository;
	}

	/**
	 * Handle the event.
	 *
	 * @param  ClickBusCompraFinalizada  $event
	 * @return void
	 */
	public function handle(ClickBusCompraFinalizada $event)
	{
        $Compra = $event->CompraClickBus;

        //se o status for de finalizada, entao o pagamento ja foi aprovado e podemos disparar o email de sucesso direto
        if ($Compra->status == $this->clickBusRepository->FLAG_ORDEM_FINALIZADA) {
            //Envia email de sucesso no pagamento
            Mail::send('emails.clickbus.sucesso', ['Compra' => $Compra], function ($message) use ($Compra) {
                $message->to($Compra->buyer_email, $Compra->buyer_firstname)->subject(trans('clickbus.clickbus_email-vivala-subject-success'));
                $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
            });

        } else {
            //Envia email de pagamento pendente
            Mail::send('emails.clickbus.pendente', ['Compra' => $Compra], function ($message) use ($Compra) {
                $message->to($Compra->buyer_email, $Compra->buyer_firstname)->subject(trans('clickbus.clickbus_email-vivala-subject-pending'));
                $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
            });
        }
	}

}
