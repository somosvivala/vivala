<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0; margin-top:20px;">
      <tbody>
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
      </tbody>
    </table>
  </div>
</td>
