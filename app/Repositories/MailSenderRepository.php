<?php

namespace app\Repositories;


class MailSenderRepository {

  public function sendEmail($view, $user_to, $message, $subject, $user_from)
  {
    Mail::send($view, ['user' => $user], function ($message) use ($user) {
        $message->to($user->email, $user->username)->subject($subject);
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }
}
