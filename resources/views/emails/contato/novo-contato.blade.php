<?php
  $emailCabecalho = 'Email de Contato';
  $emailTitulo = '<strong>[Email automático]</strong><br>Formulário de Contato';
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
                  ID do usuário:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormContato->user_id }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Nome:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormContato->nome }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Email:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormContato->email }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Assunto:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormContato->assunto }}
                </span>
              </p>
              <p style="margin-top:20px;">
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454;">
                  Mensagem:
                </span>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal;">
                  {{ $FormContato->mensagem }}
                </span>
              </p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </td>
@include('emails._footer')
