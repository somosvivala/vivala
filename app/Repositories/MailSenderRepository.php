<?php

namespace app\Repositories;
use Mail;

class MailSenderRepository {

  public function sendMailNoReply($email_view, $message, $subject, $user_to)
  {
    Mail::send($email_view, ['user' => $user_to], function ($message) use ($user_to) {
        $message->to($user_to->email, $user_to->username)->subject($subject);
        $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
    });
  }
}
