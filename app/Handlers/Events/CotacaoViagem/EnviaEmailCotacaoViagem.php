<?php namespace App\Handlers\Events\CotacaoViagem;

use App\Events\NovaCotacaoViagem;
use App\Repositories\MailSenderRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailCotacaoViagem {

	private $mailSenderRepository;

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
	public function handle($event)
	{
		$this->mailSenderRepository->enviaEmailCotacaoViagem($event->CotacaoViagem);
	}

}
