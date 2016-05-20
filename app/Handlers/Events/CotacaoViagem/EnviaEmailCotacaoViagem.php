<?php namespace App\Handlers\Events\CotacaoViagem;

use App\Events\NovaCotacaoViagem;
use App\Repositories\MailSenderRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class EnviaEmailCotacaoViagem {

	private $repository;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(MailSenderRepository $repository)
	{
		$this->mailSenderRepository = $repository;
	}

	/**
	 * Handle the event.
	 *
	 * @param  NovaCotacaoViagem  $event
	 * @return void
	 */
	public function handle(NovaCotacaoViagem $event)
	{
		$CotacaoViagem = $event->CotacaoViagem;

		// Mail::send('emails.cotacaoviagens.sucesso', ['Cotacao' => $CotacaoViagem], function ($message) use ($CotacaoViagem) {
		// 		$message->to($Compra->buyer_email, $Compra->buyer_firstname)->subject(trans('clickbus.clickbus_email-vivala-subject-success'));
		// 		$message->from('noreply@vivalabrasil.com.br', 'Vivalá');
		// });
	}

}
