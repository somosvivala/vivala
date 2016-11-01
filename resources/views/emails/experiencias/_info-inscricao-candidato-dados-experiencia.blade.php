<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:10px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0;">
      <tbody>
      
        <!-- Seção RESUMO DA EXPERIÊNCIA -->
        <tr align="left" style="text-align:left;">
          <td align="left" style="text-align:left;">
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:10px;">
              Resumo da Experiência
            </h3>
          </td>
        </tr>
        <tr>
          <td>
            <p style="float:left; margin-top:0px; margin-right:20px;">
              <img src="{{ $Inscricao->experiencia->FotoCapaUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
            </p>
            <p style="margin-top:0px; margin-bottom:10px; text-align: center;">
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bold; color:#F06F37; line-height:1.2em; padding-right: 10px;">
                {{ mb_strtoupper(trim($Inscricao->experiencia->nome), 'utf-8') }}
              </span>
            </p>
            <p>
              <img src="{{ asset('/img/icones/png/cinza-calendario-certo.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top; padding-right:5px;" min-width="24px" width="24px" max-width="24px" min-height="224px" height="24px" max-height="24px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:200; color:#545454; line-height:1.3em; vertical-align:middle;">
                <strong>{{ trim($Inscricao->dataExperiencia->format('d/m/Y')) }}</strong>
              </span>
            </p>
            <p>
              <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.lbl_localization') }}" title="{{ trans('global.lbl_localization') }}" style="vertical-align:top; padding-right:6px; padding-left:3px;" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px"/>
              <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.3em; vertical-align:middle;">
                <strong>{{ ucfirst(mb_strtoupper(trim($Inscricao->experiencia->local->nome), 'utf-8')) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla), 'utf-8') }}</strong>
              </span>
            </p>
            <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em;">
              {{ trim($Inscricao->experiencia->descricao) }}
            </p>
          </td>
        </tr>
        <!-- Fim da Seção RESUMO DA EXPERIÊNCIA -->

        <!-- Seção DETALHES DA EXPERIÊNCIA -->
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
        
        <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->

        <!-- Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->
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
                          <td>
                            <img src="{{ asset('img/icones/png/cinza-calendario.png') }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-right:20px;"/>
                          </td>
                          <td>
                            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em;">
                              {{ ucfirst(mb_strtolower(trim($Inscricao->experiencia->frequencia), 'utf-8')) }}
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>      
                  </td>
                </tr>
                @if($Inscricao->experiencia->informacoes)
                <tr>
                  <td>
                    <table>
                      <tbody>
                        @foreach($Inscricao->experiencia->informacoes as $Informacao)
                        <tr valign="middle" style="vertical-align:middle;">
                          <td>
                            <img src="{{ $Informacao->PathIconePNG }}" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px" style="margin-right:20px;"/>
                          </td>
                          <td>
                            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1em;">
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
        <!-- Fim da Seção de INFORMAÇÕES EXTRAS DA EXPERIÊNCIA -->

      </tbody>
    </table>
  </div>
</td>
