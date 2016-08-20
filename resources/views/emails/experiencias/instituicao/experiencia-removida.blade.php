@include('emails._header', [
  'emailCabecalho' => 'A sua experiência foi removida com sucesso!',
  'emailTitulo' => 'A sua experiência foi removida'
])

  <!-- Primeira SEÇÃO -->
  <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 20px 0 20px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
      <table style="width: 100%; padding-bottom:0; margin-top:20px; padding-bottom:0;">
        <tbody>
          <!-- Título da Primeira Estrutura -->
          <tr align="center">
            <td>
              <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-weight:bold; font-size:26px; color:#CB171E; margin-bottom:20px;">
                Sua Experiência foi removida da Vivalá!
              </h1>
            </td>
          </tr>
          <!-- Fim do Título da Primeira Estrutura -->
          <!-- Imagem da Primeira Estrutura -->
          <tr align="center">
            <td>
              <img src="{{ asset('img/icones/png/vermelho-cancelado-vazio.png') }}" alt="" title="" min-width="99px" width="auto" max-width="600px" min-height="150px" height="150px" max-height="150px" style="margin-bottom:20px;"/>
            </td>
          </tr>
          <!-- Fim da Imagem da Primeira Estrutura -->
          <!-- Seção de INFOS BANCÁRIAS -->
          <!-- Sub-título da Primeira Estrutura -->
          <tr align="center">
            <td>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; color:#CB171E;">
                Sua experiência foi removida da Vivalá por algum motivo,<br>
                para saber melhor o que ocorreu entre em contato conosco<br>
                através do email <strong>{{ env('VIVALA_LINK_EMAIL') }}</strong><br>
                ou pelo telefone <strong>{{ env('VIVALA_LINK_TELEFONE_CONTATO2') }}
              </p>
            </td>
          </tr>
          <!-- Fim do Sub-título da Primeira Estrutura -->
        </tbody>
      </table>
    </div>
  </td>
  <!-- Fim da Primeira SEÇÃO -->
  <!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
    <tr></tr>
  </td>
  <!-- Fim do Separador -->
  <!-- Segunda SEÇÃO -->
  <td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 20px 0 20px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
      <table style="width: 100%; padding-bottom:0; margin-top:0; padding-bottom:0;">
        <tbody>
          <!-- Seção INFORMAÇÕES DA EXPERIÊNCIA -->
          <tr>
            <td style="padding-bottom:30px;">
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                Informações da sua Experiência
              </h3>
              <p style="float:left; margin-top:0; margin-bottom:0;">
                <img src="{{ $Experiencia->FotoOwnerUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
                <span style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; position:relative; right:40px; bottom:190px; color:#FFFFFF; background-color:#F06F37; padding: 5px 15px;" title="ID da Experiência">ID {{ str_pad(trim($Experiencia->id), 3, '0', STR_PAD_LEFT) }}</span>
              </p>
              <p style="margin-top:10px; margin-bottom:10px;">
                <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                  TIPO
                </span>
                <br>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  @if($Experiencia->isEventoUnico) Evento Único
                  @elseif ($Experiencia->isEventoRecorrente) Evento Recorrente
                  @elseif ($Experiencia->isEventoServico) Evento Serviço
                  @endif
                </span>
              </p>
              {{-- NECESSÁRIO (???)
              <p style="margin-top:10px; margin-bottom: 10px;">
                <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                  PREÇO
                </span>
                <br>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  R${{ $Experiencia->preco }}
                </span>
              </p>
              --}}
              <p style="margin-top:10px; margin-bottom: 10px;">
                <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                  LOCAL
                </span>
                <br>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ ucfirst(trim($Experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Experiencia->local->estado->sigla)) }}
                </span>
              </p>
              <p style="margin-top:10px; margin-bottom: 10px;">
                <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                  ENDEREÇO
                </span>
                <br>
                <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
                  {{ ucfirst($Experiencia->endereco_completo) }}
                </span>
              </p>
            </td>
          </tr>
          <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
          <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
          <tr>
            <td style="padding-bottom:30px;">
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                Descrição da sua Experiência
              </h3>
              <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                {{ trim($Experiencia->descricao) }}
              </p>
            </td>
          </tr>
          <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
          <!-- Seção DETALHES DA EXPERIÊNCIA -->
          <tr>
            <td style="padding-bottom:0px;">
              <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                Detalhes da sua Experiência
              </h3>
              <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                {{ trim($Experiencia->detalhes) }}
              </p>
            </td>
          </tr>
          <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
          <!-- Seção DETALHES EXTRAS DA EXPERIÊNCIA -->
          @if(!empty($Experiencia->informacoes))
            <tr>
              <td>
                <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
                  Informações Extras da sua Experiência
                </h3>
              </td>
            </tr>
            @foreach($Experiencia->informacoes as $Informacao)
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
          <!-- Seção ENVIE SUA DÚVIDA OU SUGESTÃO  -->
          <tr align="center">
            <td>
              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; margin-top:50px; margin-bottom:0px;">
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
  <!-- Fim da Segunda SEÇÃO -->
  <!-- Separador -->
  <td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 20px;">
    <tr></tr>
  </td>
  <!-- Fim do Separador -->

@include('emails._footer')
