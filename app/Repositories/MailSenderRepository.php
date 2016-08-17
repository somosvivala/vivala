<?php

namespace App\Repositories;

use Mail;
use App\User;
use App\Experiencia;
use App\InscricaoExperiencia;

/**
 * Classe para concentrar os triggers de envio de email da plataforma,
 * assim quem for mandar email precisa de uma instancia de MailSenderRepository
 */
class MailSenderRepository
{
    /**
    * Método para disparar o email TESTE
    * @param $user - Instância de usuário para visualizar algumas infos no email
    */
    public function enviaEmailTeste(User $user)
    {
      Mail::send('emails.modelobasicovivala', ['user' => $user], function ($message) use ($user) {
          // Se em live ou production SEMPRE enviar pro email de TESTE, sempre!
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - TESTE DE EMAIL] 1, 2, 3... Testando');
          $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
    * Método para disparar o email de boas vindas a um novo usuário
    * @param $user - Instância de usuário para o qual queremos enviar o email
    * de boas vindas
    */
    public function enviaEmailBemVindo(User $user)
    {
      Mail::send('emails.bemvindo', ['user' => $user], function ($message) use ($user) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($user->email, $user->username)->subject('Bem vindo à Vivalá');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EMAIL BOAS VINDAS] Bem vindo à Vivalá');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
    * Método para disparar o email de contato da Vivalá para a plataforma
    * @param $FormContato - Objeto que contém informações da request do Formulário de Contato + user_id
    * plataforma
    */
    public function enviaEmailFormularioContato($FormContato)
    {
      Mail::send('emails.contato.novo-contato', ['FormContato' => $FormContato], function ($message)  {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('[VIVALÁ] Resposta pelo Formulário de Contato');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EMAIL DE CONTATO] Resposta pelo Formulário de Contato');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
    * Método para disparar o email de feedback da Vivalá para a plataforma
    * @param $FormFeedback - Objeto que contém informações da request do Formulário de Feedback + user_email + user_nome
    * plataforma
    */
    public function enviaEmailFormularioFeedback($FormFeedback)
    {
      Mail::send('emails.feedback.novo-feedback', ['FormFeedback' => $FormFeedback], function ($message)  {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('[VIVALÁ] Resposta pelo Formulário de Feedback');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EMAIL DE FEEDBACK] Resposta pelo Formulário de Feedback');
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
      Mail::send('emails.cotacaoviagem.novo-cotacao', ['CotacaoViagem' => $CotacaoViagem], function ($message) use ($CotacaoViagem) {
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
    * Método enviaEmailExperienciaPlataformaExperienciaPublicada
    * @param $Experiencia - Instância de Experiência
    */
    public function enviaEmailExperienciaPlataformaExperienciaPublicada(Experiencia $Experiencia)
    {
      Mail::send('emails.experiencias.plataforma.experiencia-publicada', ['Experiencia' => $Experiencia], function ($message) use ($Experiencia) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('Vivalá Experiências - Uma Experiência foi aprovada na plataforma');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIAS] Experiência Aprovada - Plataforma');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
    * Método enviaEmailExperienciaInstituicaoExperienciaPublicada
    * @param $Experiencia - Instância de Experiência
    */
    public function enviaEmailExperienciaInstituicaoExperienciaPublicada(Experiencia $Experiencia)
    {
      Mail::send('emails.experiencias.instituicao.experiencia-publicada', ['Experiencia' => $Experiencia], function ($message) use ($Experiencia) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($Experiencia->owner->email_contato, $Experiencia->owner->nome)->subject('Vivalá Experiências - Sua Experiência foi aprovada na Vivalá!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIAS] Experiência Aprovada - Instituição');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
    * Método enviaEmailExperienciaPlataformaNovaInscricao
    * @param $Inscricao - Instância de Inscrição (Experiencia x Usuario)
    */
    public function enviaEmailExperienciaPlataformaNovaInscricao(InscricaoExperiencia $Inscricao)
    {
      Mail::send('emails.experiencias.plataforma.inscricao-nova', ['Inscricao' => $Inscricao], function ($message) use ($Inscricao) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to('contato@vivalabrasil.com.br', 'Vivalá')->subject('Vivalá Experiências - Uma nova inscrição de experiência foi realizada');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIAS] Inscrição de Experiência Pendente - Plataforma');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
    * Método enviaEmailExperienciaCandidatoPagamentoPendente
    * @param $Inscricao - Instância de Inscrição (Experiencia x Usuario)
    */
    public function enviaEmailExperienciaCandidatoPagamentoPendente(InscricaoExperiencia $Inscricao)
    {
      Mail::send('emails.experiencias.candidato.inscricao-pagamento-pendente', ['Inscricao' => $Inscricao], function ($message) use ($Inscricao) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($Inscricao->perfil->user->email, $Inscricao->perfil->apelido)->subject('Vivalá Experiências - Sua inscrição na experiência foi feita!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIAS] Inscrição de Experiência Pendente - Candidato');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

   /**
    * Método enviaEmailExperienciaCandidatoPagamentoConfirmado
    * @param $Inscricao - Instância de Inscrição (Experiencia x Usuario)
    */
    public function enviaEmailExperienciaCandidatoPagamentoConfirmado(InscricaoExperiencia $Inscricao)
    {
      Mail::send('emails.experiencias.candidato.inscricao-pagamento-confirmado', ['Inscricao' => $Inscricao], function ($message) use ($Inscricao) {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($Inscricao->perfil->user->email, $Inscricao->perfil->apelido)->subject('Vivalá Experiências - Sua experiência foi confirmada!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIAS] Inscrição de Experiência Confirmada - Candidato');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

    /**
     * Método EnviaEmailExperienciaInstituicaoInscricaoConfirmada
     * @param $Inscricao - Instância de Inscrição (Experiencia x Usuario)
     */
     public function enviaEmailExperienciaInstituicaoInscricaoConfirmada(InscricaoExperiencia $Inscricao)
     {
       Mail::send('emails.experiencias.instituicao.inscricao-pagamento-confirmado', ['Inscricao' => $Inscricao], function ($message) use ($Inscricao) {
         //se estiver em production, manda email para a live
         if(app()->environment('production'))
           $message->to($Inscricao->perfil->user->email, $Inscricao->perfil->apelido)->subject('Vivalá Experiências - Sua experiência foi confirmada!');
         //se estiver em development, manda o email para a sandbox
         else if(app()->environment('development'))
           $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIAS] Inscrição de Experiência Confirmada - Candidato');
         $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
       });
     }

    /**
    * Método para disparar o email de experiência confirmada na plataforma, avisando
    * a INSTITUIÇÃO que temos uma experiência confirmada com sucesso
    * @param $
    */
    public function enviaEmailExperienciaCandidatoConfirmadaInstituicao(InscricaoExperiencia $Inscricao)
    {
      Mail::send('emails.experiencias..inscricaoconfirmadainstituicao', [], function ($message) use () {
        //se estiver em production, manda email para a live
        if(app()->environment('production'))
          $message->to($user->email, $user->username)->subject('Vivalá - Experiência confirmada com sucesso!');
        //se estiver em development, manda o email para a sandbox
        else if(app()->environment('development'))
          $message->to('teste@vivalabrasil.com.br', 'Vivalá')->subject('[SANDBOX - EXPERIÊNCIA] Experiência Confirmada para a Instituição');
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
    }

}
