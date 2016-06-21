<!DOCTYPE html>
<html>
  <head>
    <title>{{ trans('global.title_vivala') }} - Email de Feedback</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
    /***************************************
    * FONTES
    ***************************************/
      @font-face {
        font-family: 'Avenir Light';
        src: url('/fonts/avenir/Avenir-Light/Avenir-Light.eot');
        src: url('/fonts/avenir/Avenir-Light/Avenir-Light?#iefix') format('embedded-opentype'),
        url('/fonts/avenir/Avenir-Light/Avenir-Light.woff2') format('woff2'),
        url('/fonts/avenir/Avenir-Light/Avenir-Light.woff') format('woff'),
        url('/fonts/avenir/Avenir-Light/Avenir-Light.ttf') format('truetype'),
        url('/fonts/avenir/Avenir-Light/Avenir-Light.svg#Avenir-Light') format('svg');
      }
      @font-face{
        font-family: 'Avenir Medium';
        src: url('/fonts/avenir/Avenir-Medium/Avenir-Medium.eot');
        src: url('/fonts/avenir/Avenir-Medium/Avenir-Medium?#iefix') format('embedded-opentype'),
        url('/fonts/avenir/Avenir-Medium/Avenir-Medium.woff2') format('woff2'),
        url('/fonts/avenir/Avenir-Medium/Avenir-Medium.woff') format('woff'),
        url('/fonts/avenir/Avenir-Medium/Avenir-Medium.ttf') format('truetype'),
        url('/fonts/avenir/Avenir-Medium/Avenir-Medium.svg#Avenir-Medium') format('svg');
      }
      @font-face{
        font-family: 'Avenir Roman';
        src: url('/fonts/avenir/Avenir-Roman/Avenir-Roman.eot');
        src: url('/fonts/avenir/Avenir-Roman/Avenir-Roman?#iefix') format('embedded-opentype'),
        url('/fonts/avenir/Avenir-Roman/Avenir-Roman.woff2') format('woff2'),
        url('/fonts/avenir/Avenir-Roman/Avenir-Roman.woff') format('woff'),
        url('/fonts/avenir/Avenir-Roman/Avenir-Roman.ttf') format('truetype'),
        url('/fonts/avenir/Avenir-Roman/Avenir-Roman.svg#Avenir-Roman') format('svg');
      }
      @font-face{
        font-family: 'Avenir Black';
        src: url('/fonts/avenir/Avenir-Black/Avenir-Black.eot');
        src: url('/fonts/avenir/Avenir-Black/Avenir-Black?#iefix') format('embedded-opentype'),
        url('/fonts/avenir/Avenir-Black/Avenir-Black.woff2') format('woff2'),
        url('/fonts/avenir/Avenir-Black/Avenir-Black.woff') format('woff'),
        url('/fonts/avenir/Avenir-Black/Avenir-Black.ttf') format('truetype'),
        url('/fonts/avenir/Avenir-Black/Avenir-Black.svg#Avenir-Black') format('svg');
      }
      @font-face{
        font-family: 'FuturaBT Bold';
        src: url('/fonts/futura/FuturaBT-Bold/Futura-BTBold.eot');
        src: url('/fonts/futura/FuturaBT-Bold/Futura-BTBold?#iefix') format('embedded-opentype'),
        url('/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.woff2') format('woff2'),
        url('/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.woff') format('woff'),
        url('/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.ttf') format('truetype'),
        url('/fonts/futura/FuturaBT-Bold/FuturaBT-Bold.svg#FuturaBT-Bold') format('svg');
      }

      /***************************************
      * GLOBAL
      ***************************************/
        * {
          font-family: "Avenir Roman", "Helvetica", Helvetica, Arial, sans-serif;
          font-size: 100%;
          line-height: 1.6em;
          margin: 0;
          padding: 0;
        }
        img {
          max-width: 600px;
          width: auto;
        }
        body {
          -webkit-font-smoothing: antialiased;
          height: 100%;
          -webkit-text-size-adjust: none;
          width: 100% !important;
        }
      /***************************************
      * TIPOGRAFIA
      ***************************************/
      h1,
      h2,
      h3 {
        color: #111111;
        font-family: "FuturaBT Bold", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 200;
        line-height: 1.2em;
        margin: 40px 0 10px;
      }
      h1 {
        font-size: 30px;
      }
      h2 {
        font-size: 28px;
      }
      h3 {
        font-size: 22px;
      }
      p,
      ul,
      ol {
        font-size: 14px;
        font-weight: normal;
        margin-bottom: 10px;
      }
      ul li,
      ol li {
        margin-left: 5px;
        list-style-position: inside;
      }
      /***************************************
      * ELEMENTOS
      ***************************************/
      a {
        color: #F16F2B;
      }
      /***************************************
      * CORPO
      ***************************************/
      table.body-wrap {
        padding: 20px;
        width: 100%;
      }
      /***************************************
      * RODAPÉ
      ***************************************/
      table.footer-wrap {
        clear: both !important;
        width: 100%;
      }
      table.footer-wrap a {
        color: transparent;
      }
      /***************************************
      * RESPONSIVIDADE
      ***************************************/
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        clear: both !important;
        display: block !important;
        margin: 0 auto !important;
        max-width: 600px !important;
      }
      .container-divisor {
        clear: both !important;
        display: block !important;
        margin: 0 auto !important;
        max-width: 600px !important;
      }
      /* Set the padding on the td rather than the div for Outlook compatibility */
      .body-wrap .container {
        padding: 20px;
      }
      .body-wrap .container-divisor {
        padding: 5px 20px;
      }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        display: block;
        margin: 0 auto;
        max-width: 600px;
      }
      .content-header {
        display: block;
        margin: 0 auto;
        max-width: 600px;
        margin-bottom:20px;
      }
      /* Let's make sure tables in the content area are 100% wide */
      .content table {
        width: 100%;
      }
      </style>
  </head>
  <body bgcolor="#D1D3D4">
    <!-- Corpo -->
    <table class="body-wrap" bgcolor="#D1D3D4" style="margin-bottom:10px;">
      <tbody>
        <tr>
        <!-- Cabeçalho da Vivalá -->
        <td class="container" bgcolor="#F06F37">
          <div class="content">
            <table>
              <tbody>
              <!-- Logo da VIVALÁ -->
              <tr align="center">
                <td>
                  <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank">
                    <img src="{{ asset('logo-branco.png') }}" alt="{{ trans('global.alt_vivala') }}" title="{{ trans('global.title_vivala') }}" style="display:block; margin:auto;" border="0" width="100%" max-width="150px" height="100%" max-height="82px">
                  </a>
                </td>
              </tr>
              <!-- Fim do Logo da VIVALÁ -->
              <!-- Separador -->
              <tr align="center">
                <td>
                  <div style="border-bottom: 1px solid #FFFFFF;width: 300px;margin: 25px 0;"></div>
                </td>
              </tr>
              <!-- Fim do Separador -->
              <!-- Título do EMAIL -->
              <tr align="center">
                <td>
                  <h3 style="color:#FFFFFF; margin-top:0;">[Email automático]</h3>
                  <h3 style="color:#FFFFFF; margin-top:0;">Formulário de feedback da plataforma</h3>
                </td>
              </tr>
              <!-- Fim do Título do EMAIL -->
              </tbody>
            </table>
          </div>
        </td>
        <!-- Fim do Cabeçalho da Vivalá -->
        <!-- Separador -->
        <td class="container-divisor" bgcolor="#D1D3D4">
          <tr></tr>
        </td>
        <!-- Fim do Separador -->
        <!-- Corpo do Email -->
        <td class="container" bgcolor="#FFFFFF">
          <div class="content">
            <table style="padding-bottom:0;">
              <tbody>
                <tr>
                  <td>
                    <p><span style="color:#545454;">Nome:</span> <span>{{ $FormFeedback->nome }}</span></p>
                    <p><span style="color:#545454;">Email:</span> <span>{{ $FormFeedback->email }}</span></p>
                    <p><span style="color:#545454;">Tipo de Feedback:</span> <span>{{ $FormFeedback->tipo }}</span></p>
                    <p><span style="color:#545454;">Mensagem:</span> <span>{{ $FormFeedback->mensagem }}</span></p>
                  </td>
                </tr>
                <!-- Quinta SEÇÃO -->
                <tr align="center">
                  <td>
                    <p style="margin-top:20px;">Envie sua dúvida para <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">contato@vivalabrasil.com.br</a><p>
                  </td>
                </tr>
                <!-- Fim da Quinta SEÇÃO -->
              </tbody>
            </table>
          </div>
        </td>
        <!-- Fim do Corpo do Email -->
        <!-- Assinatura do Email -->
        <td class="container" bgcolor="#D1D3D4">
          <div class="content">
            <table>
              <tr>
                <td align="center">
                  <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-fb-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-ig-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-link-cor-icone.png') }}"/>
                  </a>
                  <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-mail-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank" style="color:transparent;">
                    <img src="{{ asset('img/email/vivala-email-in-cor-icone.png') }}"/>
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <!-- Fim da Assinatura do Email -->
      </tr>
      </tbody>
    </table>
    <!-- Fim do Corpo -->
    <!-- Rodapé -->
    <table class="footer-wrap"></footer>
    <!-- Fim do Rodapé -->
  </body>
</html>
