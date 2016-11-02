<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:10px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding:0; margin:0px;">
      <tbody>
        <!-- Seção DADOS DO USUÁRIO -->
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:0px;">
              Dados do usuário
            </h3>
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tbody>
                <tr valign="middle" style="vertical-align:middle;">
                  <td>
                    <img src="{{ asset('/img/icones/png/cinza-usuario.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px" style="margin-right:10px;"/>
                  </td>
                  <td>
                    <p style="margin:0px; padding:0px; padding-bottom:5px;">
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1em;">Nome:</span>
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1em;">
                        {{ $Inscricao->perfil->nome_completo }}
                      </span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tbody>
                <tr valign="middle" style="vertical-align:middle;">
                  <td>
                    <img src="{{ asset('/img/icones/png/cinza-envelope.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/>
                  </td>
                  <td>
                    <p style="margin:0px; padding:0px; padding-bottom:5px;">
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1em;">Email:</span>
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1em;">
                        {{ $Inscricao->perfil->user->email }}
                      </span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>  
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tbody>
                <tr valign="middle" style="vertical-align:middle;">
                  <td>
                    <img src="{{ asset('/img/icones/png/cinza-hashtag.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/>
                  </td>
                  <td>
                    <p style="margin:0px; padding:0px; padding-bottom:5px;">
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1em;">ID da Inscrição:</span>
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1em;">
                        {{ str_pad(trim($Inscricao->id), 4, '0', STR_PAD_LEFT) }}
                      </span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>    
          </td>
        </tr>
        <tr>
          <td>
            <table>
              <tbody>
                <tr valign="middle" style="vertical-align:middle;">
                  <td>
                    <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/>
                  </td>    
                  <td>
                    <p style="margin:0px; padding:0px; padding-bottom:5px;">
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1em;">Data da Inscrição:</span>
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1em;">
                        {{ $Inscricao->dataExperiencia->format('d/m/Y') }}
                      </span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr> 
        <tr>
          <td>
            <table>
              <tbody>
                <tr valign="middle" style="vertical-align:middle;">
                  <td>
                    <img src="{{ asset('/img/icones/png/cinza-asterisco.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/>
                  </td>
                  <td>
                    <p style="margin:0px; padding:0px; padding-bottom:5px;">
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1em;">Status da Inscrição:</span>
                      <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1em;">
                        <strong style="color:@if($Inscricao->isPendente) #F89916; @elseif($Inscricao->isConfirmada) #25A494; @elseif($Inscricao->isCancelada) #CB171E; @endif">
                          {{ mb_strtoupper(trim($Inscricao->status)) }}
                        </strong>
                      </span>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>       
          </td>
        </tr>
        <!-- Fim da Seção DADOS DO USUÁRIO -->
      </tbody>
    </table>
  </div>
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding:0; margin:0px;">
      <tbody>
        <!-- Separador -->
        <tr align="center">
          <td>
            <div style="border-bottom: 2px solid #ECEBEB; width:300px; margin:10px 0;"></div>
          </td>
        </tr>
        <!-- Fim do Separador -->
      </tbody>
    </table>
  </div>
</td>
