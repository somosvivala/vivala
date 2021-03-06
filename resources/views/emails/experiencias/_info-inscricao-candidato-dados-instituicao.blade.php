<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:0px;">
      <tbody>

        <!-- Seção INFORMAÇÕES DA ONG -->
        <tr align="center">
          <td>
            <table style="padding:15px 15px; background-color:#ECEBEB; border-radius:15px; min-height:170px; height:170px; max-height:170px; min-width:450px; width:450px; max-width:450px; margin:20px auto 0; overflow:hidden;">
              <tbody>
                <tr width="100%" style="width:100%;">
                  <td width="5%" style="width:5%;"></td>
                  <td width="32%" style="width:32%;">
                    <div style="display:inline-block; min-width:100px; width:100px; max-width:100px; border-right:1px solid #BCBEC0; text-align:center; padding-right:10px;">
                      <table width="100%" style="width:100%;">
                        <tbody>
                          <!-- FOTO / ICONE DA INSTITUIÇÃO -->
                          <tr>
                            <td>
                              <a href="{{ url('/experiencias/'.$Inscricao->experiencia->id) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
                                <img src="{{ $Inscricao->experiencia->FotoOwnerUrlPublica }}" alt="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" title="{{ ucfirst($Inscricao->experiencia->owner_nome) }}" min-width="65px" width="65px" max-width="65px" min-height="65px" height="65px" max-height="65px" style="border-radius:50%; padding:0px; margin:0px;"/>
                              </a>
                            </td>
                          </tr>
                          <!-- Fim da FOTO / ICONE DA INSTITUIÇÃO -->
                          <!-- NOME DA INSTITUIÇÃO -->
                          <tr>
                            <td>
                              <a href="{{ url('/experiencias/'.$Inscricao->experiencia->id) }}" target="_blank" style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:normal; text-decoration:none; color:#545454;">
                                <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; margin-top:0; margin-bottom:0; font-size:14px; line-height:18px;">
                                  {{ $Inscricao->experiencia->owner_nome = (strlen(trim($Inscricao->experiencia->owner_nome)) > 30) ? ucfirst(substr(trim($Inscricao->experiencia->owner_nome),0,30)) . '[...]' : ucfirst(trim($Inscricao->experiencia->owner_nome)) }}
                                </p>
                              </a>
                            </td>
                          </tr>
                          <!-- Fim do NOME DA INSTITUIÇÃO -->
                          <!-- ICONES DE REDES SOCIAIS DA INSTITUIÇÃO -->
                          <tr>
                            <td>    
                              <table width="100%" style="width:100%;line-height:1em;">
                                <tbody>
                                  <tr width="100%" style="width:100%;line-height:1em;">
                                    <td width="20%" style="width:20%;"></td>
                                    <td width="20%" style="width:20%;">
                                      <span style="margin-top:10px; margin-bottom: 0;">
                                        <a href="{{ $Inscricao->experiencia->url_facebook_responsavel }}" target="_blank" style="color:transparent!important;">
                                          <img src="{{ asset('img/icones/png/cinza-mini-fb-circulo.png') }}" alt="{{ trans('global.social_network_facebook') }}" title="{{ trans('global.social_network_facebook') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                                        </a>
                                      </span>
                                    </td>
                                    <td width="20%" style="width:20%;">
                                      <span style="margin-top:10px; margin-bottom: 0;">
                                        <a href="{{ $Inscricao->experiencia->url_instagram_responsavel }}" target="_blank" style="color:transparent!important;">
                                          <img src="{{ asset('img/icones/png/cinza-mini-ig-circulo.png') }}" alt="{{ trans('global.social_network_instagram') }}" title="{{ trans('global.social_network_instagram') }}" min-width="17px" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                                        </a>
                                      </span>
                                    </td>
                                    <td width="20%" style="width:20%;">
                                      <span style="margin-top:10px; margin-bottom: 0;">
                                        <a href="{{ $Inscricao->experiencia->url_externa_responsavel }}" target="_blank" min-width="17px" style="color:transparent!important;">
                                        <img src="{{ asset('img/icones/png/cinza-mini-link-circulo.png') }}" alt="{{ trans('global.lbl_website') }}" title="{{ trans('global.lbl_website') }}" width="17px" max-width="17px" min-height="18px" height="18px" max-height="18px"/>
                                        </a>
                                      </span>
                                    </td>
                                    <td width="21.3%" style="width:21.3%;"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <!-- Fim dos ICONES DE REDES SOCIAIS DA INSTITUIÇÃO -->
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td width="58%" style="width:58%;">
                    <div style="display:inline-block; vertical-align:top; min-width:320px; width:320px; max-width:320px; margin-left:15px;">
                      <table width="100%" style="width:100%;">
                        <tbody>
                          <!-- DESCRIÇÃO DA INSTITUIÇÃO -->
                          <tr>
                            <td>
                              <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; text-align:justify; margin-top:0;">
                                {{ $Inscricao->experiencia->owner_descricao = (strlen(trim($Inscricao->experiencia->owner_descricao)) > 260) ? substr(trim($Inscricao->experiencia->owner_descricao),0,260) . ' [...]' : trim($Inscricao->experiencia->owner_descricao) }}
                              </p>
                            </td>
                          </tr>
                          <!-- Fim da DESCRIÇÃO DA INSTITUIÇÃO -->
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td width="5%" style="width:5%;"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <!-- Fim da Seção INFORMAÇÕES DA ONG -->

      </tbody>
    </table>
  </div>
</td>
