<body>
    Testando envio de mensagem com formatação:<br> 
    Olá,&nbsp; &nbsp;{{ $user->perfil->apelido }}<br>
    <br>
    <img src="<?php echo $message->embed($user->perfil->getAvatarUrl()); ?>">
    <br>
    <br>
    Voce foi testado!
    <br>
</body>
