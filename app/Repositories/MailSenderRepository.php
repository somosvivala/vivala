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
   * Método para disparar o email de nova experiência na plataforma, avisando
   * o candidato e a equipe da vivalá de que temos um novo pedido de experiência
   * @param $
   */
   public function enviaEmailNovaInscricaoExperiencia()
   {
      //Envia email para o CANDIDATO
      Mail::send('emails.experiencias.novainscricaocandidato', [], function ($message) use () {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($user->email, $user->username)->subject('Vivalá - Inscrição da Experiência realizada com sucesso!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIA] Inscrição da Experiência Candidato');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });

      //Envia email para a VIVALÁ
      Mail::send('emails.experiencias.novainscricaoplataforma', [], function ($message) use () {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('[EXPERIÊNCIA] Nova inscrição de experiência realizada!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIA] Inscrição da Experiência Plataforma');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
   }

   /**
    * Método para disparar o email de experiência confirmada na plataforma, avisando
    * o candidato e a instituição que temos uma experiência confirmada com sucesso
    * @param $
    */
   public function enviaEmailInscricaoConfirmadaExperiencia()
   {
     //Envia email para CANDIDATO
     Mail::send('emails.experiencias.inscricaoconfirmadacandidato', [], function ($message) use () {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($user->email, $user->username)->subject('Vivalá - Experiência confirmada com sucesso!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIA] Experiência Confirmada para o Candidato');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });

    //Envia email para a INSTITUIÇÃO
    Mail::send('emails.experiencias.inscricaoconfirmadainstituicao', [], function ($message) use () {
      //se estiver em production, manda email para a live
      if(app()->environment('production'))
        $message->to($user->email, $user->username)->subject('Vivalá - Experiência confirmada com sucesso!');
      //se estiver em development, manda o email para a sandbox
      else if(app()->environment('development'))
        $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIA] Experiência Confirmada para a Instituição');
      $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
   }

    /**
    * Método para disparar o email de cotacao de viagens, avisando a
    * equipe da vivalá de que temos um novo pedido de cotacao
    * @param $CotacaoViagem - Objeto da cotação que contém o usuário para
    * enviarmos o email e os dados da cotação
    */
    public function enviaEmailCotacaoViagem($CotacaoViagem)
    {
      Mail::send('emails.cotacaoviagens.sucesso', ['CotacaoViagem' => $CotacaoViagem], function ($message) use ($CotacaoViagem) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('[COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - COTAÇÃO DE VIAGEM] Enviado pela Plataforma');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
     * Método para disparar o email de boas vindas a um novo usuário
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
