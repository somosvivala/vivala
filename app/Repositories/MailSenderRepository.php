<?php

namespace App\Repositories;

use Mail;
use App\User;

/**
 * Classe para concentrar os triggers de envio de email da plataforma,
 * assim quem for mandar email precisa de uma instancia de MailSenderRepository
 */
class MailSenderRepository
{

    /**
     * Metodo para disparar o email de cotacao de viagens, avisando a
     * equipe da vivalá de que temos um novo pedido de cotacao
     */
    public function enviaEmailCotacaoViagem($CotacaoViagem)
    {
        Mail::send('emails.cotacaoviagens.sucesso', ['CotacaoViagem' => $CotacaoViagem],
            function ($message) use ($CotacaoViagem) {
                if(app()->environment('production')) {
                    $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('[COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
                }

                //se estiver em development, manda o email para a sandbox
                else if(app()->environment('development')) {
                    $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
                }

                $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
            });
    }

    /**
     * Metodo para disparar o email de boas vindas a um novo usuário
     * @param $user - Instancia de usuário para o qual queremos enviar o email
     * de boas vindas
     */
    public function enviaEmailBemVindo(User $user)
    {
        Mail::send('emails.bemvindo', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Bem vindo à Vivalá');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });
    }


}
