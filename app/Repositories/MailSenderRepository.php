<?php

namespace app\Repositories;
use Mail;


class MailSenderRepository {

  public function enviaEmailCotacaoViagem($CotacaoViagem)
  {
    Mail::send('emails.cotacaoviagens.sucesso', ['CotacaoViagem' => $CotacaoViagem],
    function ($message) use ($CotacaoViagem) {
        $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('[COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
    		$message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }

}
