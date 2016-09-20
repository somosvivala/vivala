@extends('emails._base', [
  'emailCabecalho' => 'Email de Feedback',
  'emailTitulo' => 'Formulário de Feedback'
])

  @section('email-conteudo')
    <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
      <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:20px;">
          <tbody>
            <tr>
              <td>
                <p><img src="{{ asset('/img/icones/png/cinza-usuario.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Nome: </span>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $FormFeedback->nome }}
                  </span>
                </p>
                <p><img src="{{ asset('/img/icones/png/cinza-envelope.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Email: </span>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $FormFeedback->email }}
                  </span>
                </p>
                <p><img src="{{ asset('/img/icones/png/cinza-asterisco.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Tipo de Feedback: </span>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $FormFeedback->tipo }}
                  </span>
                </p>
                <p><img src="{{ asset('/img/icones/png/cinza-balao-conversa.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Mensagem: </span>
                  <br>
                  <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                    {{ $FormFeedback->mensagem }}
                  </span>
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </td>
  @stop
