          <!-- Fim do Corpo Total do Email -->
          <!-- Assinatura do Email -->
          <td bgcolor="#ECEBEB" style="clear:both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:20px 20px 0 20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tr>
                  <td align="center">
                    <a href="{{ env('VIVALA_LINK_FACEBOOK') }}" target="_blank" alt="{{ trans('global.social_network_facebook_img_alt') }}" title="{{ trans('global.social_network_facebook_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-fb-circulo.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_INSTAGRAM') }}" target="_blank" alt="{{ trans('global.social_network_instagram_img_alt') }}" title="{{ trans('global.social_network_instagram_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-ig-circulo.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_SITE') }}" target="_blank" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_site') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_site') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-vivala-circulo.png') }}"/>
                    </a>
                    <a href="mailto:{{ env('VIVALA_LINK_EMAIL') }}" target="_top" alt="{{ trans('global.alt_vivala') }} {{ trans('global.lbl_email') }}" title="{{ trans('global.title_vivala') }} {{ trans('global.lbl_email') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-email-circulo.png') }}"/>
                    </a>
                    <a href="{{ env('VIVALA_LINK_LINKEDIN') }}" target="_blank" alt="{{ trans('global.social_network_linkedin_img_alt') }}" title="{{ trans('global.social_network_linkedin_img_title') }}" style="color:transparent;">
                      <img src="{{ asset('img/icones/png/colorido-in-circulo.png') }}"/>
                    </a>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <!-- Fim da Assinatura do Email -->
        </tr>
      </tbody>
    </table>
    <!-- Fim do Corpo -->
    <!-- Rodapé -->
    <table style="clear:both!important; width: 100%;">
      <tbody>
        <tr>
          <td style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:0 20px 20px 20px;">
            <div style="display:block; margin:0 auto; max-width:600px;">
              <table style="width: 100%;">
                <tbody>
                <tr align="center">
                  <td>
                    <h4 style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:10px; font-weight:200; line-height:1.2em; margin-top:0;">
                      Feito com carinho pela Vivalá - Conecte-se ao Brasil de verdade
                    </h4>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Fim do Rodapé -->
  </body>
</html>
