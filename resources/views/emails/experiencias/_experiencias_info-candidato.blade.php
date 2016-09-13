<!-- Segunda SEÇÃO -->
<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:0;">
      <tbody>
        @if($divisor)
          <!-- Divisor -->
          <tr align="center">
            <td>
              <div style="border-bottom:1px solid #DCDEDF; width:500px; margin:50px 0;"></div>
            </td>
          </tr>
          <!-- Fim do Divisor -->
        @endif
        <!-- Seção INFORMAÇÕES DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:40px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
              Informações da sua Experiência
            </h3>
            <p style="float:left; margin-top:0; margin-bottom:0;">
              <img src="{{ $$Inscricao->experiencia->FotoOwnerUrlPublica }}" min-width="240px" width="auto" max-width="600px" min-height="240px" height="240px" max-height="240px" style="margin-right:20px;"/>
            </p>
            <p style="margin-top:10px; margin-bottom:20px;">
              <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                {{ trim($Inscricao->dataExperiencia->format('d/m/Y')) }}
              </span>
            </p>
            <p style="margin-top:10px; margin-bottom: 20px;">
              <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                {{ ucfirst(trim($Inscricao->experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla)) }}
              </span>
            </p>
            <p style="margin-top:10px; margin-bottom: 20px;">
              <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                {{ ucfirst($Inscricao->experiencia->endereco_completo) }}
              </span>
            </p>
            <p style="margin-top:10px; margin-bottom: 20px;">
              <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                R${{ $Inscricao->experiencia->preco }}
              </span>
            </p>
          </td>
        </tr>
        <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
        <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
              Descrição
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Inscricao->experiencia->descricao) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <!-- Seção DETALHES DA EXPERIÊNCIA -->
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
              Detalhes
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Inscricao->experiencia->detalhes) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
        <!-- Seção DETALHES EXTRAS DA EXPERIÊNCIA -->
        @if($Inscricao->experiencia->informacoes)
          <tr>
            <td>
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:20px;">
                Informações Extras
              </h3>
            </td>
          </tr>
          @foreach($Inscricao->experiencia->informacoes as $Informacao)
          <tr>
            <td>
              <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
                <img src="{{ $Informacao->PathIconePNG }}" min-width="32px" width="32px" max-width="32px" min-height="32px" height="32px" max-height="32px"/>
              </p>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:0px;">
                {{ ucfirst(strtolower(trim($Informacao->descricao))) }}
              </p>
            </td>
          </tr>
          @endforeach
        @endif
        <!-- Fim da Seção de DETALHES EXTRAS DA EXPERIÊNCIA -->
      </tbody>
    </table>
  </div>
</td>
<!-- Fim da Segunda SEÇÃO -->
<!-- Terceira SEÇÃO -->
<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:20px;">
      <tbody>
        <!-- Seção INFORMAÇÕES DA ONG -->
        <tr align="center">
          <td>
            <div style="padding:20px 15px; background-color:#ECEBEB; border-radius:15px; min-height:170px; height:170px; max-height:170px; min-width:450px; width:450px; max-width:450px; margin:40px auto 0; overflow:hidden;">
              <div style="display:inline-block; min-width:100px; width:100px; max-width:100px; border-right:1px solid #BCBEC0; text-align:center; padding-right:10px;">
                <a href="{{ url('/experiencias/'.$$Inscricao->experiencia->id) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
                  <p style="margin-bottom: 0;">
                    <img src="{{ $Inscricao->experiencia->getFotoOwnerUrlAttribute() }}" alt="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" title="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" min-width="65px" width="65px" max-width="65px" min-height="65px" height="65px" max-height="65px" style="border-radius:50%;"/>
                  </p>
                  <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; margin-top:0; margin-bottom:0; font-size:14px; line-height:18px;">
                    {{ $Inscricao->experiencia->owner_nome = (strlen(trim($Inscricao->experiencia->owner_nome)) > 30) ? ucfirst(substr(trim($Inscricao->experiencia->owner_nome),0,30)) . '[...]' : ucfirst(trim($Inscricao->experiencia->owner_nome)) }}
                  </p>
                </a>
                <p style="margin-top:10px; margin-bottom: 0;">
                  @if($Inscricao->experiencia->url_facebook_responsavel)
                    <span><a href="https://facebook.com/{{ $Inscricao->experiencia->experiencia->url_facebook_responsavel }}" target="_blank" style="color:transparent!important;">
                      <img src="{{ asset('img/icones/png/cinza-mini-fb-circulo.png') }}" alt="{{ trans('global.social_network_facebook') }}" title="{{ trans('global.social_network_facebook') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                    </a></span>
                  @endif
                  @if($Inscricao->experiencia->url_instagram_responsavel)
                    <span><a href="https://instagram.com/{{ $Inscricao->experiencia->url_instagram_responsavel }}" target="_blank" style="color:transparent!important;">
                      <img src="{{ asset('img/icones/png/cinza-mini-ig-circulo.png') }}" alt="{{ trans('global.social_network_instagram') }}" title="{{ trans('global.social_network_instagram') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                    </a></span>
                  @endif
                  @if($Inscricao->experiencia->url_externa_responsavel)
                    <span><a href="http://{{ $Inscricao->experiencia->url_externa_responsavel = preg_replace('#^www\.(.+\.)#i', '$1', $Inscricao->experiencia->url_externa_responsavel) }}" target="_blank" min-width="17px" style="color:transparent!important;">
                      <img src="{{ asset('img/icones/png/cinza-mini-link-circulo.png') }}" alt="{{ trans('global.lbl_website') }}" title="{{ trans('global.lbl_website') }}" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                    </a></span>
                  @endif
                </p>
              </div>
              <div style="display:inline-block; vertical-align:top; min-width:320px; width:320px; max-width:320px; margin-left:15px;">
                <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; text-align:justify; margin-top:0;">
                  {{ $Inscricao->experiencia->owner_descricao = (strlen(trim($Inscricao->experiencia->owner_descricao)) > 260) ? substr(trim($Inscricao->experiencia->owner_descricao),0,260): trim($Inscricao->experiencia->owner_descricao) }}
                </p>
              </div>
            </div>
          </td>
        </tr>
        <!-- Fim da Seção INFORMAÇÕES DA ONG -->
        <!-- Seção ENVIE SUA DÚVIDA OU SUGESTÃO  -->
        <tr align="center">
          <td>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; margin-top:30px; margin-bottom:0px;">
              Envie sua dúvida ou sugestão para
              <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" style="text-decoration:none; color:#F06F37;">{{ env('VIVALA_LINK_EMAIL') }}</a>
            <p>
          </td>
        </tr>
        <!-- Fim da Seção ENVIE SUA DÚVIDA OU SUGESTÃO  -->
      </tbody>
    </table>
  </div>
</td>
<!-- Fim da Terceira SEÇÃO -->
