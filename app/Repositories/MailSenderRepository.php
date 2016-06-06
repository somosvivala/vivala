<?php

namespace app\Repositories;
use Mail;


class MailSenderRepository {

  public function enviaEmailCotacaoViagem($CotacaoViagem)
  {
    Mail::send('emails.cotacaoviagens.sucesso', ['CotacaoViagem' => $CotacaoViagem],
    function ($message) use ($CotacaoViagem) {
      if(app()->environment('production'))
        $message->to('cotacao@vivala.com.br', 'Vivalá')->subject('[COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
      else
        $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
      $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }

}
