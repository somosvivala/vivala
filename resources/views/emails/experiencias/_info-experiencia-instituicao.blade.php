<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:0;">
      <tbody>

        <!-- Seção RESUMO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tr>
                <td style="padding-bottom:40px;">
                  <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                    Resumo da Experiência
                  </h3>
                  <p style="float:left; margin-top:0; margin-bottom:0;">
                    <img src="{{ $Experiencia->FotoCapaUrlPublica }}" min-width="240px" width="auto" max-width="600px" min-height="300px" height="300px" max-height="300px" style="margin-right:20px;"/>
                  </p>
                  <p style="margin-top:10px; margin-bottom:10px; text-align: center;">
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; color:#F06F37; line-height:1.2em; padding-right: 20px;">
                      {{ mb_strtoupper(trim($Experiencia->nome)) }}
                    </span>
                  </p>
                  <p style="margin-top:10px; margin-bottom:10px;">
                    <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
                      TIPO
                    </span>
                    <br>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em;">
                      @if($Experiencia->isEventoUnico)
                        Evento Único
                      @elseif ($Experiencia->isEventoRecorrente)
                        Evento Recorrente
                      @elseif ($Experiencia->isEventoServico)
                        Evento Serviço
                      @endif
                    </span>
                  </p>
                  <p style="margin-top:10px; margin-bottom: 10px;">
                    <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:bottom;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em; vertical-align:bottom;">
                      LOCAL
                    </span>
                    <br>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em; vertical-align:bottom;">
                      {{ ucfirst(trim($Experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Experiencia->local->estado->sigla)) }}
                    </span>
                  </p>
                  <p style="margin-top:10px; margin-bottom: 10px;">
                    <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:bottom;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em; vertical-align:bottom;">
                      ENDEREÇO
                    </span>
                    <br>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em; vertical-align:bottom;">
                      {{ ucfirst($Experiencia->endereco_completo) }}
                    </span>
                  </p>
                  <p style="margin-top:10px; margin-bottom: 10px;">
                    <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:bottom;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em; vertical-align:bottom;">
                      VALOR
                    </span>
                    <br>
                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1.2em; vertical-align:bottom;">
                      R${{ $Experiencia->preco }}
                    </span>
                  </p>
                  <p style="margin-top:15px; margin-bottom: 15px;">
                    <span style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:19px; font-weight:bold; color:#FFFFFF; background-color:#F06F37; padding: 4px 15px;" title="ID da Experiência">
                      ID {{ str_pad(trim($Experiencia->id), 3, '0', STR_PAD_LEFT) }}
                    </span>
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção RESUMO DA EXPERIÊNCIA -->

        <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tbody>
                <tr style="padding-bottom:10px;">
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                              Descrição
                            </h3>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                              {{ trim($Experiencia->descricao) }}
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->

        <!-- Seção DETALHES DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tbody>
                <tr style="padding-bottom:10px;">
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                              Detalhes
                            </h3>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
                              {{ trim($Experiencia->detalhes) }}
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->

        <!-- Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table>
              <tbody>
                <tr style="padding-bottom:0px;">
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td align="left" style="text-align:left;">
                            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
                              Informações Extras
                            </h3>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table>
                              <tbody>
                                <tr valign="middle" style="vertical-align:middle;">
                                  <td style="padding:0px;">
                                    <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-top:0px; margin-bottom:5px; margin-right:20px;"/>
                                  </td>
                                  <td style="padding:0px;">
                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; padding-bottom:5px; margin-top:0px; margin-bottom:0px;">
                                      {{ ucfirst(mb_strtolower(trim($Experiencia->frequencia), 'utf-8')) }}
                                    </p>
                                  </td>
                                </tr>
                              </tbody>
                            </table>      
                          </td>
                        </tr>
                        @if($Experiencia->informacoes)
                        <tr>
                          <td>
                            <table>
                              <tbody>
                                @foreach($Experiencia->informacoes as $Informacao)
                                <tr valign="middle" style="vertical-align:middle;">
                                  <td>
                                    <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-top:0px; padding-bottom:5px; margin-top:0px; margin-bottom:0px;"/>
                                  </td>
                                  <td>
                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; margin-top:0px; margin-bottom:5px;">
                                      {{ ucfirst(mb_strtolower(trim($Informacao->descricao), 'utf-8')) }}
                                    </p>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->

      </tbody>
    </table>
  </div>
</td>
