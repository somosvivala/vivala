<?php

namespace app\Handlers\Events;

use App\Events\PerfilHasVolunteered;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class SendMailsWhenPerfilHasVolunteered implements ShouldBeQueued
{
    //Array com id das vagas das olimpiadas
    //assim podemos testar o condicional
    private $IdsOlimpiadas = [19];

    /**
     * Create the event handler.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PerfilHasVolunteered $event
     */
    public function handle(PerfilHasVolunteered $event)
    {
        $vaga = $event->vaga;
        $perfil = $event->perfil;
        $User = $perfil->user;

        //Se ja nao for voluntario, tornar-se voluntario
        if (!$vaga->voluntarios->find($perfil->id)) {
            $vaga->voluntarios()->save($perfil);
            $vaga->push();
            $responsavel = $vaga->responsavel;

            if (in_array($vaga->id, $this->IdsOlimpiadas)) {
                //Se for uma vaga das olimpiadas:
                $this->sendEmailOlimpiadas($event);

            } else {
                //Se for uma vaga que não as da olimpiada:
                $this->sendNormalVolunteerEmail($event);
            }
        }
    }

    /**
     * Envia o Email especifico para as vagas das olimpiadas
     *
     * @param PerfilHasVolunteered $event
     */
    public function sendEmailOlimpiadas(PerfilHasVolunteered $event)
    {
        $vaga = $event->vaga;
        $perfil = $event->perfil;
        $User = $perfil->user;
        $responsavel = $vaga->responsavel;

        //Envio de email para o responsável avisando e para o candidato agradecendo
        Mail::send('emails.olimpiadas.obrigadocandidato', ['user' => $perfil->user, 'vaga' => $vaga], function ($message) use ($User) {
            $message->to($User->email, $User->perfil->apelido)->subject('Confirmação de Pré-Inscrição de voluntariado nos Jogos Olímpicos e Paralímpicos Rio 2016');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });

        Mail::send('emails.obrigadoong', ['user' => $perfil->user, 'vaga' => $vaga], function ($message) use ($responsavel) {
            $message->to($responsavel->user->email, $responsavel->apelido)->subject('Alguém se candidatou como voluntário para as Olímpiadas.');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });
    }
    /**
     * Envia o email padrão de voluntariado
     *
     * @param PerfilHasVolunteered $event
     */
    public function sendNormalVolunteerEmail(PerfilHasVolunteered $event)
    {
        $vaga = $event->vaga;
        $perfil = $event->perfil;
        $User = $perfil->user;
        $responsavel = $vaga->responsavel;

        //Envio de email para o responsável avisando e para o candidato agradecendo
        Mail::send('emails.obrigadocandidato', ['user' => $perfil->user, 'vaga' => $vaga], function ($message) use ($User) {
            $message->to($User->email, $User->perfil->apelido)->subject('Olá, tudo bem?');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });

        Mail::send('emails.obrigadocandidato', ['user' => $perfil->user, 'vaga' => $vaga], function ($message) use ($responsavel) {
            $message->to($responsavel->user->email, $responsavel->apelido)->subject('Olá, Alguém se candidatou a uma vaga no seu projeto.');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });
    }
}
