<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:10px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0;">
      <tbody>

        <!-- Seção RESUMO DA EXPERIÊNCIA -->
        <tr>
          <td>
            <table style="width:100%; padding-bottom:0; margin-top:0;">
              <tbody>
                <tr>
                  <td style="padding:0px; margin:0px;">
                    <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin:0px; padding:0px; margin-bottom:10px;">
                      Resumo da Experiência
                    </h3>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table style="width:100%" width="100%">
                      <tbody>
                        <tr valign="top" style="vertical-align:top;">
                          <td>
                            <table style="width:35%" width="35%">
                              <tbody>
                                <tr>
                                  <td>
                                    <table style="width:100%" width="100%">
                                      <tbody>
                                        <!-- FOTO DA EXPERIÊNCIA -->
                                        <tr valign="bottom" style="vertical-align:bottom;">
                                          <td style="padding:0px;">
                                            <img src="{{ $Inscricao->experiencia->FotoCapaUrlPublica }}" min-width="240px" width="auto" max-width="240px" min-height="240px" height="240px" max-height="240px" style="padding:0px; margin:0px; vertical-align:bottom;"/>
                                          </td>
                                        </tr>
                                        <!-- Fim da FOTO DA EXPERIÊNCIA -->
                                      </tbody>                
                                    </table>
                                  </td>  
                                </tr>
                              </tbody>
                            </table>
                          </td>
                          <td>
                            <table style="width:100%" width="100%">
                              <tbody>
                                <tr>
                                  <td width="100%" style="width:100%;">
                                    <table style="width:100%" width="100%">
                                      <tbody>
                                        <!-- NOME DA EXPERIÊNCIA -->
                                        <tr>
                                          <td>
                                            <p style="margin-top:0px; margin-bottom:10px; text-align:left; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; color:#F06F37; line-height:1em;">
                                                {{ mb_strtoupper(trim($Inscricao->experiencia->nome), 'utf-8') }}
                                            </p>
                                          </td>
                                        </tr>
                                        <!-- Fim do NOME DA EXPERIÊNCIA -->
                                        <!-- DATA DA EXPERIÊNCIA -->
                                        <tr style="line-height:1em;">
                                          <td>
                                            <table style="width:100%; table-layout:fixed;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:10%; text-align:center;" width="10%">
                                                   <img src="{{ asset('/img/icones/png/cinza-calendario-certo.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
                                                  </td>
                                                  <td style="width:85%; text-align: left;" width="85%">
                                                    <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:200; color:#545454; line-height:1em; vertical-align:middle;">
                                                    <strong>{{ trim($Inscricao->dataExperiencia->format('d/m/Y')) }}</strong>
                                                  </span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        <!-- Fim da DATA DA EXPERIÊNCIA -->
                                        <!-- LOCAL -->
                                        <tr style="line-height:1em;">
                                          <td>
                                            <table style="width:100%; table-layout:fixed;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:10%; text-align:center;" width="10%">
                                                    <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.lbl_localization') }}" title="{{ trans('global.lbl_localization') }}" min-width="18px" width="18px" max-width="18px" min-height="18px" height="18px" max-height="18px"/>
                                                  </td>
                                                  <td style="width:85%; text-align: left;" width="85%">
                                                    <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; color:#545454; line-height:1em; margin:0px; padding:0px;">
                                                      {{ ucwords(mb_strtolower(trim($Inscricao->experiencia->local->nome), 'utf-8')) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla), 'utf-8') }}
                                                    </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        <!-- Fim do LOCAL -->
                                        <!-- DESCRIÇÃO DA EXPERIÊNCIA -->
                                        <tr style="line-height:1em;">
                                          <td>
                                            <table style="width:100%; table-layout:fixed;" width="100%">
                                              <tbody>
                                                <tr valign="middle" style="vertical-align:middle;">
                                                  <td style="width:100%; text-align: left;" width="100%">
                                                    <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
                                                    {{ trim($Inscricao->experiencia->descricao) }}
                                                  </p>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        <!-- Fim da DESCRIÇÃO DA EXPERIÊNCIA -->
                                      </tbody>
                                    </table>
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
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção RESUMO DA EXPERIÊNCIA -->

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
                              {{ trim($Inscricao->experiencia->detalhes) }}
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
                        <tr style="line-height:1em;">
                          <td>
                            <table>
                              <tbody>
                                @if($Inscricao->experiencia->frequencia)
                                  <tr valign="middle" style="vertical-align:middle;">
                                    <td style="padding:0px;">
                                      <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-top:0px; margin-bottom:5px; margin-right:20px;"/>
                                    </td>
                                    <td style="padding:0px;">
                                      <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; padding-bottom:5px; margin-top:0px; margin-bottom:0px;">
                                        {{ ucfirst(mb_strtolower(trim($Inscricao->experiencia->frequencia), 'utf-8')) }}
                                      </p>
                                    </td>
                                  </tr>
                                @endif
                                @if($Inscricao->experiencia->informacoes)
                                  @foreach($Inscricao->experiencia->informacoes as $Informacao)
                                    <tr valign="middle" style="vertical-align:middle;">
                                      <td>
                                        <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-top:0px; margin-bottom:5px; margin-right:20px;"/>
                                      </td>
                                      <td>
                                        <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em; padding-bottom:5px; margin-top:0px; margin-bottom:0px;">
                                          {{ ucfirst(mb_strtolower(trim($Informacao->descricao), 'utf-8')) }}
                                        </p>
                                      </td>
                                    </tr>
                                    @endforeach
                                  @endif
                              </tbody>
                            </table>
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
        <!-- Fim da Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->

      </tbody>
    </table>
  </div>
</td>
