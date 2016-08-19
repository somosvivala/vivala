<?php
  $emailCabecalho = 'Email de Feedback';
  $emailTitulo = '<strong>[Email automático]</strong><br>Formulário de Feedback';
?>

@include('emails._header', ['emailCabecalho' => $emailCabecalho, 'emailTitulo' => $emailTitulo])
  <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
      <table style="width: 100%; padding-bottom:0; margin-top:20px;">
        <tbody>
          <tr align="left">
            <td>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Nome:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormFeedback->nome }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Email:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormFeedback->email }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Tipo de Feedback:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormFeedback->tipo }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Mensagem:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormFeedback->mensagem }}
                </span>
              </p>
            </td>
          </tr>
          <!-- Seção ENVIE SUA DÚVIDA  -->
          <tr align="center">
            <td>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; margin-top:20px;">
                Envie sua dúvida para
                <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">contato@vivalabrasil.com.br</a>
              <p>
            </td>
          </tr>
          <!-- Fim da Seção ENVIE SUA DÚVIDA  -->
        </tbody>
      </table>
    </div>
  </td>
@include('emails._footer')
