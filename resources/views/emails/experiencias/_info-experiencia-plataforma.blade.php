<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <!-- Seção INFORMAÇÕES DA EXPERIÊNCIA -->
    <table style="width: 100%; padding-bottom:0; margin-top:0;">
      <tbody>
        <tr width="600px" style="width:600px;">
          <td width="600px" style="width:600px; padding:0px; margin:0px; margin-bottom:10px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin:0px; padding:0px;">
              Resumo da Experiência
            </h3>
          </td>
        </tr>
        <tr width="600px" style="width:600px;">
          <td width="300px" style="width:300px;">
            <p style="padding:0px; margin:0px;">
              <img src="{{ $Experiencia->FotoCapaUrlPublica }}" min-width="240px" width="auto" max-width="300px" min-height="300px" height="300px" max-height="300px"/>
            </p>
          </td>
          <td width="300px" style="width:300px;">
            <table>
              <tbody>
                <tr width="300px" style="width:300px;">
                  <td>
                    <p style="margin-top:10px; margin-bottom:10px; text-align: center;">
                      <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; color:#F06F37; line-height:1em;">
                        {{ mb_strtoupper(trim($Experiencia->nome), 'utf-8') }}
                      </span>
                    </p>
                  </td>
                </tr>
                <tr width="300px" style="width:300px;">
                  <td>
                    <table>
                      <tbody>
                        <div style="margin-top:10px; margin-bottom:10px;">
                          <tr>
                            <td>
                              <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                            </td>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                              TIPO
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                                @if($Experiencia->isEventoUnico)
                                  Evento Único
                                @elseif ($Experiencia->isEventoRecorrente)
                                  Evento Recorrente
                                @elseif ($Experiencia->isEventoServico)
                                  Evento Serviço
                                @endif
                              </span>
                            </td>
                          </tr>
                        </div>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr width="300px" style="width:300px;">
                  <td>
                    <table>
                      <tbody>
                        <div style="margin-top:10px; margin-bottom:10px;">
                          <tr>
                            <td>
                              <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:bottom;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                            </td>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                                LOCAL
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em; vertical-align:bottom;">
                                {{ ucfirst(mb_strtolower(trim($Experiencia->local->nome), 'utf-8')) }} - {{ mb_strtoupper(trim($Experiencia->local->estado->sigla), 'utf-8') }}
                              </span>
                            </td>
                          </tr>
                        </div>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr width="300px" style="width:300px;">
                  <td>
                    <table>
                      <tbody>
                        <div style="margin-top:10px; margin-bottom:10px;">
                          <tr>
                            <td>
                              <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:bottom;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                            </td>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                                ENDEREÇO
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em; vertical-align:bottom;">
                                {{ ucfirst(mb_strtoupper(trim($Experiencia->endereco_completo), 'utf-8')) }}
                              </span>
                            </td>
                          </tr>
                        </div>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr width="300px" style="width:300px;">
                  <td>
                    <table>
                      <tbody>
                        <div style="margin-top:10px; margin-bottom:10px;">
                          <tr>
                            <td>
                              <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:bottom;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                            </td>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                                VALOR
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em; vertical-align:bottom;">
                                R${{ $Experiencia->preco }}
                              </span>
                            </td>
                          </tr>
                        </div>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr width="600px" style="width:600px;">
          <td width="300px" style="width:300px;">
            <p style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:19px; font-weight:bold; color:#FFFFFF; background-color:#F06F37; padding: 4px 15px;" title="ID da Experiência">
                ID {{ str_pad(trim($Experiencia->id), 3, '0', STR_PAD_LEFT) }}
            </p>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
    <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
    <table style="width: 100%; padding-bottom:0; margin-top:0;">
      <tbody>
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Descrição
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Experiencia->descricao) }}
            </p>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
    <!-- Seção DETALHES DA EXPERIÊNCIA -->
    <table style="width: 100%; padding-bottom:0; margin-top:0;">
      <tbody>
        <tr>
          <td style="padding-bottom:30px;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Detalhes
            </h3>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
              {{ trim($Experiencia->detalhes) }}
            </p>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
        



        <!-- Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Informações Extras
            </h3>
          </td>
        </tr>
        <tr>
          <td>
            <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
              <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
            </p>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; margin-top:5px; margin-bottom:0px;">
              {{ ucfirst(mb_strtolower(trim($Experiencia->frequencia), 'utf-8')) }}
            </p>
          </td>
        </tr>
        @if($Experiencia->informacoes)
          @foreach($Experiencia->informacoes as $Informacao)
            <tr>
              <td>
                <p style="float:left; margin-top:0px; margin-right:20px; margin-bottom:0px;">
                  <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                </p>
                <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; margin-top:6px; margin-bottom: 5px;">
                  {{ ucfirst(mb_strtolower(trim($Informacao->descricao), 'utf-8')) }}
                </p>
              </td>
            </tr>
          @endforeach
        @endif
        <!-- Fim da Seção de INFORMAÇÃO DA EXPERIÊNCIA -->
      </tbody>
    </table>
  </div>
</td>
