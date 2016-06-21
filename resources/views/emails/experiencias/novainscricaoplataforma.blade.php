<!DOCTYPE html>
<html>
  <head>
    <title></title>
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
        color: #348eda;
      }
      .btn-primary {
        Margin-bottom: 10px;
        width: auto !important;
      }
      .btn-primary td {
        background-color: #348eda;
        border-radius: 25px;
        font-family: 'Avenir-Roman', Helvetica, Arial, "Lucida Grande", sans-serif;
        font-size: 14px;
        text-align: center;
        vertical-align: top;
      }
      .btn-primary td a {
        background-color: #348eda;
        border: solid 1px #348eda;
        border-radius: 25px;
        border-width: 10px 20px;
        display: inline-block;
        color: #ffffff;
        cursor: pointer;
        font-weight: bold;
        line-height: 2;
        text-decoration: none;
      }
      .last {
        margin-bottom: 0;
      }
      .first {
        margin-top: 0;
      }
      .padding {
        padding: 10px 0;
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
      .footer-wrap .container p {
        color: #666666;
        font-size: 12px;
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
                      <img src="{{ asset('logo-branco.png') }}" alt="Vivalá" style="display:block; margin:auto;" border="0" width="100%" max-width="150px" height="100%" max-height="82px">
                    </a>
                  </td>
                </tr>
                <!-- Fim do Logo da VIVALÁ -->
                <!-- Divisor -->
                <tr align="center">
                  <td>
                    <div style="border-bottom: 1px solid #FFFFFF;width: 300px;margin: 25px 0;"></div>
                  </td>
                </tr>
                <!-- Fim do Divisor -->
                <!-- Título do EMAIL -->
                <tr align="center">
                  <td>
                    <h3 style="color:#FFFFFF; margin-top:0;">Falta apenas um passo para sua experiência acontecer!</h3>
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
              <table style="padding-bottom:0; margin-top:20px;">
                <tbody>
                  <!-- Primeira SEÇÃO -->
                  <!-- Título da Primeira Estrutura -->
                  <tr align="center">
                    <td>
                      <h1 style="color:#FAA325;">Você está quase lá!</h1>
                    </td>
                  </tr>
                  <!-- Fim do Título da Primeira Estrutura -->
                  <!-- Imagem da Primeira Estrutura -->
                  <tr align="center">
                    <td>
                      <img src="{{ asset('img/email/vivala-pagamento-pendente-icone-2.png') }}" width="99px;" height="99px;"/>
                    </td>
                  </tr>
                  <!-- Fim da Imagem da Primeira Estrutura -->
                  <!-- Seção de INFOS BANCÁRIAS -->
                  <tr align="center">
                    <td>
                      <p>Para confirmar sua inscrição na experiência da <strong>NOME INSTITUIÇÃO</strong></p>
                      <p>realize o depósito de <strong>R$VAL.OR</strong> na conta a seguir:</p>
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <div style="background-color:#ECEBEB; text-align:left; padding:10px; max-width:300px; margin-left:20px; margin-right:20px;">
                        <p style="color:#545454;"><b>CONTA</b> <span>420.420.420-42</span></p>
                        <p style="color:#545454;"><b>AGÊNCIA</b> <span>0420</span></p>
                        <p style="color:#545454;"><b>CPF/CNPJ</b> <span>420.420.420-42</span></p>
                        <p style="color:#545454;"><b>BANCO</b> <span>Banco dos BR</span></p>
                      </div>
                    </td>
                  </tr>
                  <!-- Fim da Seção de INFOS BANCÁRIAS -->
                  <!-- Seção do DEPÓSITO -->
                  <tr align="center">
                    <td>
                      <p style="margin-top:30px;">Não se esqueça de nos enviar o comprovante clicando no botão abaixo!</p>
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <button style="font-family: Avenir Black; font-size: 20px; text-transform: uppercase; color:#F06F37; background-color:#FFFFFF; padding:15px 30px; border:1px solid #F06F37; margin-left:20px; margin-right:20px;">ENVIAR COMPROVANTE DE DEPÓSITO</button>
                    </td>
                  </tr>
                  <!-- Fim da Seção do DEPÓSITO -->
                  <!-- Seção do BOLETO BANCÁRIO -->
                  <tr align="center">
                    <td>
                      <p style="margin-top:30px;">Ou pague com boleto bancário:</p>
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <div style="padding:15px 30px; border:1px solid #25A494; max-width:200px;">
                        <span>
                          <img style="vertical-align:middle;" src="{{ asset('img/email/vivala-email-codigo-de-barras-icone.png') }}"/>
                          <span style="font-family:Avenir Black; font-size:16px; color:#25A494; text-transform:uppercase; margin-left: 15px;">GERAR BOLETO</span>
                        </span>
                      </div>
                    </td>
                  </tr>
                  <!-- Fim da Seção do BOLETO BANCÁRIO -->
                  <!-- Divisor -->
                  <tr align="center">
                    <td>
                      <div style="border-bottom:1px solid #DCDEDF; width:500px; margin:50px 0;"></div>
                    </td>
                  </tr>
                  <!-- Fim do Divisor -->
                  <!-- Fim da Primeira SEÇÃO -->
                  <!-- Segunda SEÇÃO -->
                  <tr>
                    <td>
                      <h4 style="color:#545454; margin-bottom:15px;">
                        Detalhes da experiência
                      </h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p style="float:left; margin-right:20px;">
                        <img src="{{ asset('img/dummy_ong-splash.png') }}" width="220px" height="220px"/>
                      </p>
                      <p>
                        <span><img src="{{ asset('/img/email/vivala-email-data-icone.png') }}"/></span>
                        <span style="font-size:20px;"><strong>18 de Junho</strong></span>
                      </p>
                      <p>
                        <span><img src="{{ asset('/img/email/vivala-email-marcador-mapa-icone.png') }}"/></span>
                        <span style="font-size:16px;"><strong>Campinas - SP</strong></span>
                      </p>
                      <p style="text-align:justify;">
                        <span style="font-size:14px;">Venha conhecer a ONG Cão Feliz e ajude a alimentar cãezinhos abandonados! Escolha um final de semana e passe a tarde cuidando e alimentando cachorros. É a oportunidade perfeita para você que sente falta do seu companheiro e não pode adotar um em casa. lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet.</span>
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Segunda SEÇÃO -->
                  <!-- Terceira SEÇÃO -->
                  <tr>
                    <td>
                      <h4 style="color:#545454; margin-top:15px; margin-bottom:15px;">
                        Informações
                      </h4>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p style="float:left; margin-right:20px;">
                        <img src="{{ asset('img/email/vivala-email-agenda-icone.png') }}" width="19px" height="19px"/>
                      </p>
                      <p>
                        Semanal
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p style="float:left; margin-right:20px;">
                        <img src="{{ asset('img/email/vivala-email-hora-icone.png') }}" width="19px" height="19px"/>
                      </p>
                      <p>
                        Todos os domingos
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p style="float:left; margin-right:20px;">
                        <img src="{{ asset('img/email/vivala-email-pessoas-icone.png') }}" width="19px" height="19px"/>
                      </p>
                      <p>
                        Grupos de 10 pessoas
                      </p>
                    </td>
                  </tr>
                  <!-- Fim da Terceira SEÇÃO -->
                  <!-- Quarta SEÇÃO -->
                  <tr>
                    <td>
                      <div style="padding:20px 25px; background-color:#ECEBEB; border-radius:15px; max-height:150px; max-width:400px; margin:0 auto;">
                        <div style="position: relative; float:left; border-right:1px solid #BCBEC0; text-align:center; padding-right:15px; margin-right:15px;">
                          <p style="margin-bottom: 0;"><img src="{{ asset('img/dummy_ong-icon.png') }}" width="65px" height="65px"/></p>
                          <p style="margin-bottom: 0;">ONG Cão Feliz</p>
                          <p style="margin-bottom: 0;">
                            <span><a href="#" target="_blank"><img src="{{ asset('img/email/vivala-email-terceiros-fb-icone.png') }}"/></a></span>
                            <span><a href="#" target="_blank"><img src="{{ asset('img/email/vivala-email-terceiros-ig-icone.png') }}"/></a></span>
                            <span><a href="#" target="_blank"><img src="{{ asset('img/email/vivala-email-terceiros-site-icone.png') }}"/></a></span>
                          </p>
                        </div>
                        <div style="position: relative; text-align: center; margin-top:25px;">
                          <p>A ONG Cão feliz cuida de cãezinhos abandonados e de rua desde 2009. Realiza inúmeros projetos sociais em diversas cidades.</p>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!-- Fim da Quarta SEÇÃO -->
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
