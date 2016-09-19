<tr align="center">
  <td>
    <div style="background-color:#ECEBEB; text-align:left; padding:5px 25px; max-width:300px; margin-left:20px; margin-right:20px;">
      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-top:0;">
        <b>NOME</b> <span>{{ env('VIVALA_FANTASY_NAME') }}</span>
      </p>
      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px;">
        <b>CONTA</b> <span>{{ env('VIVALA_CC') }}</span>
      </p>
      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px;">
        <b>AGÊNCIA</b> <span>{{ env('VIVALA_AG') }}</span>
      </p>
      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px;">
        <b>CNPJ</b> <span>{{ env('VIVALA_CNPJ') }}</span>
      </p>
      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; color:#545454; font-size:16px; margin-bottom:0;">
        <b>BANCO</b> <span>{{ env('VIVALA_BANK') }}</span>
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
    <a href="mailto:{{ env('VIVALA_LINK_EMAIL')}}?subject=[VIVALÁ EXPERIÊNCIAS] Envio de Comprovante de Depósito" target="_top" style="cursor:pointer; text-decoration:none;">
      <div style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; text-transform:uppercase; color:#F06F37; background-color:#FFFFFF; padding:15px 30px; border:1px solid #F06F37; margin-left:20px; margin-right:20px; cursor:pointer;">
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
      <div style="padding:15px 30px; border:1px solid #25A494; min-width:200px; width:200px; max-width:200px; cursor:pointer;">
        <img style="display:inline-block; float:left; vertical-align:middle;" src="{{ asset('img/icones/png/verde-codebar.png') }}" min-width="55px" width="55px" max-width="55px" min-height="43px" height="43px" max-height="43px"/>
        <div style="display:block; font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; color:#25A494; text-transform:uppercase; display:block; word-break:break-word; word-wrap:break-word; padding-left:60px;">
          GERAR BOLETO
        </div>
      </div>
    </a>
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
<!-- Seção DETALHES DA EXPERIÊNCIA -->
<tr>
  <td>
    <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:15px;">
      Detalhes da experiência
    </h3>
  </td>
</tr>
<tr>
  <td>
    <p style="float:left; margin-right:20px;">
      <img src="{{ $Inscricao->experiencia->FotoCapaUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
    </p>
    <p>
      <img src="{{ asset('/img/icones/png/cinza-calendario-certo.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="224px" height="24px" max-height="24px"/>
      <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:200; color:#545454; line-height:1.2em;">
        <strong>{{ trim($Inscricao->dataExperiencia->format('d/m/Y')) }}</strong>
      </span>
    </p>
    <p>
      <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.lbl_localization') }}" title="{{ trans('global.lbl_localization') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
      <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
        <strong>{{ ucfirst(trim($Inscricao->experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla)) }}</strong>
      </span>
    </p>
    <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
      {{ trim($Inscricao->experiencia->descricao) }}
    </p>
  </td>
</tr>
<!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
<!-- Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
<tr>
  <td>
    <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:15px; margin-bottom:15px;">
      Informações
    </h3>
  </td>
</tr>
<tr>
  <td>
    <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
      <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
    </p>
    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:0px;">
      {{ ucfirst(strtolower(trim($Inscricao->experiencia->frequencia))) }}
    </p>
  </td>
</tr>
@if(!empty($Inscricao->experiencia->informacoes))
  @foreach($Inscricao->experiencia->informacoes as $Informacao)
    <tr>
      <td>
        <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
          <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
        </p>
        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:0px;">
          {{ ucfirst(strtolower(trim($Informacao->descricao))) }}
        </p>
      </td>
    </tr>
  @endforeach
@endif
<!-- Fim da Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
<!-- Seção INFORMAÇÕES DA ONG -->
<tr align="center">
  <td>
    <div style="padding:20px 15px; background-color:#ECEBEB; border-radius:15px; min-height:170px; height:170px; max-height:170px; min-width:450px; width:450px; max-width:450px; margin:40px auto 0; overflow:hidden;">
      <div style="display:inline-block; min-width:100px; width:100px; max-width:100px; border-right:1px solid #BCBEC0; text-align:center; padding-right:10px;">
        <a href="{{ url('/experiencias/'.$Inscricao->experiencia->id) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
          <p style="margin-bottom: 0;">
            <img src="{{ $Inscricao->experiencia->FotoOwnerUrlPublica }}" alt="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" title="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" min-width="65px" width="65px" max-width="65px" min-height="65px" height="65px" max-height="65px" style="border-radius:50%;"/>
          </p>
          <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; margin-top:0; margin-bottom:0; font-size:14px; line-height:18px;">
            {{ $Inscricao->experiencia->owner_nome = (strlen(trim($Inscricao->experiencia->owner_nome)) > 30) ? ucfirst(substr(trim($Inscricao->experiencia->owner_nome),0,30)) . '[...]' : ucfirst(trim($Inscricao->experiencia->owner_nome)) }}
          </p>
        </a>
        <p style="margin-top:10px; margin-bottom: 0;">
          <span><a href="https://facebook.com/{{ $Inscricao->experiencia->url_facebook_responsavel }}" target="_blank" style="color:transparent!important;">
            <img src="{{ asset('img/icones/png/cinza-mini-fb-circulo.png') }}" alt="{{ trans('global.social_network_facebook') }}" title="{{ trans('global.social_network_facebook') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
          </a></span>
          <span><a href="https://instagram.com/{{ $Inscricao->experiencia->url_instagram_responsavel }}" target="_blank" style="color:transparent!important;">
            <img src="{{ asset('img/icones/png/cinza-mini-ig-circulo.png') }}" alt="{{ trans('global.social_network_instagram') }}" title="{{ trans('global.social_network_instagram') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
          </a></span>
          <span><a href="http://{{ $Inscricao->experiencia->url_externa_responsavel = preg_replace('#^www\.(.+\.)#i', '$1', $Inscricao->experiencia->url_externa_responsavel) }}" target="_blank" min-width="17px" style="color:transparent!important;">
            <img src="{{ asset('img/icones/png/cinza-mini-link-circulo.png') }}" alt="{{ trans('global.lbl_website') }}" title="{{ trans('global.lbl_website') }}" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
          </a></span>
        </p>
      </div>
      <div style="display:inline-block; vertical-align:top; min-width:320px; width:320px; max-width:320px; margin-left:15px;">
        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; text-align:justify; margin-top:0;">
          {{ $Inscricao->experiencia->owner_descricao = (strlen(trim($Inscricao->experiencia->owner_descricao)) > 260) ? substr(trim($Inscricao->experiencia->owner_descricao),0,260) . ' [...]' : trim($Inscricao->experiencia->owner_descricao) }}
        </p>
      </div>
    </div>
  </td>
</tr>
<!-- Fim da Seção INFORMAÇÕES DA ONG -->
