<?php

namespace app\Repositories;
//use App\CotacaoViagem;
use Mail;


class MailSenderRepository {

  public function enviaEmailCotacaoViagem()
  {
    Mail::send('emails.cotacaoviagens.sucesso', ['Cotacao' => $CotacaoViagem],
    function ($message) use ($CotacaoViagem) {
    		$message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('Cotação de Viagem enviada pelo Formulário!');
    		$message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }

}
