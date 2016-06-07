<?php
namespace app\Repositories;

use Mail;

class MailSenderRepository
{

  public function enviaEmailCotacaoViagem($CotacaoViagem)
  {
    Mail::send('emails.cotacaoviagens.sucesso', ['CotacaoViagem' => $CotacaoViagem],
    function ($message) use ($CotacaoViagem)
    {
      if(env('APP_ENV') === 'production'))
        $message->to('cotacao@vivala.com.br', 'Vivalá')->subject('[COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
      if(env('APP_ENV') === 'development'))
        $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
      $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }
}
