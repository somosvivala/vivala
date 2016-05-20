<?php

namespace app\Repositories;
use Mail;
//use App\CotacaoViagem;

class MailSenderRepository {

  public function enviaEmailCotacaoViagem()
  {
    Mail::send('emails.cotacaoviagens.sucesso', ['Cotacao' => $CotacaoViagem],
    function ($message) use ($CotacaoViagem) {
    		$message->to('contato@vivalabrasil.com.br', 'Vivalá - Cotação Viagem'->subject(trans('clickbus.clickbus_email-vivala-subject-success'));
    		$message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }
}


Mail::send('emails.clickbus.pendente', ['Compra' => $Compra], function ($message) use ($Compra) {
    $message->to('contato@vivalabrasil.com.br', 'Vivalá - Cotação Viagem')->subject(trans('clickbus.clickbus_email-vivala-subject-pending'));
    $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
});
