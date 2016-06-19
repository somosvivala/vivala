<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
      /* -------------------------------------
          GLOBAL
      ------------------------------------- */
      * {
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
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
      /* -------------------------------------
          TIPOGRAFIA
      ------------------------------------- */
      h1,
      h2,
      h3 {
        color: #111111;
        font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 200;
        line-height: 1.2em;
        margin: 40px 0 10px;
      }
      h1 {
        font-size: 36px;
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
      /* -------------------------------------
          ELEMENTOS
      ------------------------------------- */
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
        font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
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
      /* -------------------------------------
          CORPO
      ------------------------------------- */
      table.body-wrap {
        padding: 20px;
        width: 100%;
      }
      table.body-wrap .container {
        border: 1px solid #f0f0f0;
      }
      /* -------------------------------------
          RODAPÉ
      ------------------------------------- */
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

      /* ---------------------------------------------------
          RESPONSIVIDADE
      ------------------------------------------------------ */
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        clear: both !important;
        display: block !important;
        margin: 0 auto !important;
        max-width: 600px !important;
      }
      /* Set the padding on the td rather than the div for Outlook compatibility */
      .body-wrap .container {
        padding: 20px;
      }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        display: block;
        margin: 0 auto;
        max-width: 600px;
      }
      /* Let's make sure tables in the content area are 100% wide */
      .content table {
        width: 100%;
      }
      </style>
  </head>
  <body bgcolor="#D1D3D4" style="padding-top:15px; padding-right:15px; padding-bottom:45px; padding-left:15px; ">
    <!-- body -->
    <table>
      <table class="body-wrap" bgcolor="#F06F37" style="margin-bottom:10px;">
        <tr>
          <td align-"center">
            <a href="https://vivala.com.br" target="_blank">
              <img src="{{ asset('logo-branco.png') }}" alt="Vivalá" style="display:block; margin:auto;" border="0" width="100%" max-width="150px" height="100%" max-height="82px">
            </a>
          </td>
        </tr>
      </table>
      <table class="body-wrap" bgcolor="#FFFFFF" style="margin-bottom:10px;">
        <tr>
          <td>
          </td>
        </tr>
      </table>
    </table>
    <!-- /body -->
    <!-- footer -->
    <table class="footer-wrap">
      <tr>
        <td class="container">
          <div class="content">
            <table>
              <tr>
                <td align="center">
                  <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank">
                    <img src="{{ asset('img/email/vivala-email-fb-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank">
                    <img src="{{ asset('img/email/vivala-email-ig-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank">
                    <img src="{{ asset('img/email/vivala-email-link-cor-icone.png') }}"/>
                  </a>
                  <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top">
                    <img src="{{ asset('img/email/vivala-email-mail-cor-icone.png') }}"/>
                  </a>
                  <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank">
                    <img src="{{ asset('img/email/vivala-email-in-cor-icone.png') }}"/>
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
    <!-- /footer -->
  </body>
</html>
