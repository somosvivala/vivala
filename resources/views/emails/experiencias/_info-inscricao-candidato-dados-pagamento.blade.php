<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:20px;">
      <tbody>
        <!-- Seção de INFOS BANCÁRIAS -->
        <tr align="center">
          <td>
            <div style="background-color:#ECEBEB; text-align:left; padding:5px 25px; max-width:300px; margin-left:20px; margin-right:20px;">
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:0; margin-bottom:5px;">
                <b>NOME</b> <span>{{ env('VIVALA_FANTASY_NAME') }}</span>
              </p>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:0; margin-bottom:5px;">
                <b>CNPJ</b> <span>{{ env('VIVALA_CNPJ') }}</span>
              </p>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:0; margin-bottom:5px;">
                <b>BANCO</b> <span>{{ env('VIVALA_BANK') }}</span>
              </p>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:0; margin-bottom:5px;">
                <b>AGÊNCIA</b> <span>{{ env('VIVALA_AG') }}</span>
              </p>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:0; margin-bottom:0;">
                <b>CONTA</b> <span>{{ env('VIVALA_CC') }}</span>
              </p>
            </div>
          </td>
        </tr>
        <!-- Fim da Seção de INFOS BANCÁRIAS -->
        <!-- Seção do DEPÓSITO -->
        <tr align="center">
          <td>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:30px;">
              Não se esqueça de nos enviar o comprovante clicando no botão abaixo!
            </p>
          </td>
        </tr>
        <tr align="center">
          <td>
            <a href="mailto:{{ env('VIVALA_LINK_EMAIL')}}?subject=[VIVALÁ EXPERIÊNCIAS - #{{ $Inscricao->id }}] Envio de Comprovante de Depósito" target="_top" style="cursor:pointer; text-decoration:none;">
              <div style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; text-transform:uppercase; color:#F06F37; background-color:#FFFFFF; padding:15px 30px; border:1px solid #F06F37; margin-left:20px; margin-right:20px; cursor:pointer;">
                ENVIAR COMPROVANTE DE DEPÓSITO
              </div>
            </a>
          </td>
        </tr>
        <!-- Fim da Seção do DEPÓSITO -->
        <!-- Seção do BOLETO BANCÁRIO -->
        <tr align="center">
          <td>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:30px;">
              Ou pague com boleto bancário:
            </p>
          </td>
        </tr>
        <tr align="center">
          <td>
            <a href="{{ env('VIVALA_LINK_SITE') }}/experiencias/checkout/{{ $Inscricao->experiencia->id }}" target="_blank" style="cursor:pointer; text-decoration:none;">
              <div style="padding:15px 0px; border:1px solid #25A494; min-width:175px; width:175px; max-width:175px; cursor:pointer; height:43px;">
                <img style="display:inline-block; float:left; vertical-align:middle; padding-left: 20px;" src="{{ asset('img/icones/png/verde-codebar.png') }}" min-width="55px" width="55px" max-width="55px" min-height="43px" height="43px" max-height="43px"/>
                <div style="display:block; font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bold; color:#25A494; text-transform:uppercase; display:block; word-break:break-word; word-wrap:break-word; padding-left:95px; padding-top: 1px; text-align:left; width:80px;">
                  GERAR<br/>BOLETO
                </div>
              </div>
            </a>
          </td>
        </tr>
        <!-- Fim da Seção do BOLETO BANCÁRIO -->
        <!-- Divisor -->
        <tr align="center">
          <td>
            <div style="border-bottom:1px solid #DCDEDF; width:500px; margin:30px 0;"></div>
          </td>
        </tr>
        <!-- Fim do Divisor -->
      </tbody>
    </table>
  </div>
</td>
