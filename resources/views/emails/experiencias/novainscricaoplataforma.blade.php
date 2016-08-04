<!DOCTYPE html>
<html>
  <head>
    <title>{{ trans('global.title_vivala') }} - </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
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
                      <button style="font-family: Avenir Black, 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size: 20px; text-transform: uppercase; color:#F06F37; background-color:#FFFFFF; padding:15px 30px; border:1px solid #F06F37; margin-left:20px; margin-right:20px;">ENVIAR COMPROVANTE DE DEPÓSITO</button>
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
                          <span style="font-family:Avenir Black, 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; color:#25A494; text-transform:uppercase; margin-left: 15px;">GERAR BOLETO</span>
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
