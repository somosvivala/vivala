<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 20px 30px; border: 2px solid @if($expCorTextos) {{ $expCorTextos }} @else '#FFF' @endif;">
  <div style="display:block; margin:0 auto; max-width:600px;">
    <table style="width: 100%; padding-bottom:0;">
      <tbody>

        <!-- Título da Primeira Estrutura -->
        @if($expTextoCima)
        <tr align="center">
          <td align="center" style="text-align:center;">
            <h1 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-weight:bold; font-size:31px; line-height:40px; color:@if($expCorTextos) {{ $expCorTextos }} @else '#FFF' @endif; margin:0px 0px 20px;">
              {!! $expTextoCima !!}
            </h1>
          </td>
        </tr>
        @endif
        <!-- Fim do Título da Primeira Estrutura -->

        <!-- Imagem da Primeira Estrutura -->
        <tr align="center">
          <td align="center" valign="middle" style="text-align:center;">
            <img src="{{ asset($expLinkImagem) }}" alt="{{ $expAltImagem }}" title="{{ $expTitleImagem }}" min-width="120px" width="120px" max-width="120px" min-height="120px" height="120px" max-height="120px"/>
          </td>
        </tr>
        <!-- Fim da Imagem da Primeira Estrutura -->

        <!-- Sub-título da Primeira Estrutura -->
        @if($expTextoBaixo)
        <tr align="center">
          <td align="center" valign="middle" style="text-align:center;">
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:20px; line-height:30px; color:@if($expCorTextos) {{ $expCorTextos }} @else '#FFF' @endif; margin:16px 0px 5px;">
              {!! $expTextoBaixo !!}
            </p>
          </td>
        </tr>
        @endif
        <!-- Fim do Sub-título da Primeira Estrutura -->
        
      </tbody>
    </table>
  </div>
</td>
<!-- Separador -->
<td bgcolor="#ECEBEB" style="clear: both!important; display: block!important; margin:0 auto!important; max-width:600px!important; padding:5px 30px;">
  <tr></tr>
</td>
<!-- Fim do Separador -->
