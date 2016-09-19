<?php
  $emailTitulo = 'Candidato(a) confirmado(a) na experiência da<br><strong>'.mb_strtoupper(trim($Inscricao->experiencia->owner_nome)).'</strong><br>';
?>
@extends('emails.experiencias._base-experiencias', [
  'emailCabecalho' => 'Inscrição Confirmada na Experiência',
  'emailTitulo' => $emailTitulo
])

    @section('email-experiencia-conteudo')
      <!-- Seção DADOS DO USUÁRIO -->
      <tr>
        <td>
          <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:0;">
            Dados do usuário
          </h3>
        </td>
      </tr>
      <tr>
        <td>
          <p><img src="{{ asset('/img/icones/png/cinza-usuario.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" max-height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Nome: </span>
            <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              {{ $Inscricao->perfil->nome_completo }}
            </span>
          </p>
          <p><img src="{{ asset('/img/icones/png/cinza-envelope.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Email: </span>
            <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              {{ $Inscricao->perfil->user->email }}
            </span>
          </p>
          <p><img src="{{ asset('/img/icones/png/cinza-hashtag.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">ID da Inscrição: </span>
            <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              {{ str_pad(trim($Inscricao->id), 4, '0', STR_PAD_LEFT) }}
            </span>
          </p>
          <p><img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Data da Inscrição: </span>
            <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              {{ $Inscricao->dataExperiencia->format('d/m/Y') }}
            </span>
          </p>
          <p><img src="{{ asset('/img/icones/png/cinza-asterisco.png') }}" min-width="20px" width="20px" max-width="20px" min-height="20px" height="20px" style="margin-right:10px;"/><span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; color:#545454; line-height:1.2em;">Status da Inscrição: </span>
            <span style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              <strong style="color:#3EA790;">{{ mb_strtoupper(trim($Inscricao->status)) }}</strong>
            </span>
          </p>
        </td>
      </tr>
      <!-- Fim da Seção DADOS DO USUÁRIO -->
      <!-- Separador -->
      <tr align="center">
        <td>
          <div style="border-bottom: 1px solid #ECEBEB; width:300px; margin:25px 0;"></div>
        </td>
      </tr>
      <!-- Fim do Separador -->
      <!-- Seção INFORMAÇÕES DA EXPERIÊNCIA -->
      <tr>
        <td style="padding-bottom:30px;">
          <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
            Informações da Experiência
          </h3>
          <p style="float:left; margin-top:0; margin-bottom:0;">
            <img src="{{ $Inscricao->experiencia->FotoOwnerUrlPublica }}" min-width="220px" width="auto" max-width="600px" min-height="220px" height="220px" max-height="220px"/>
            <span style="font-family:'Avenir Black', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:bold; position:relative; right:40px; bottom:190px; color:#FFFFFF; background-color:#F06F37; padding: 5px 15px;" title="ID da Experiência">ID {{ str_pad(trim($Inscricao->experiencia->id), 3, '0', STR_PAD_LEFT) }}</span>
          </p>
          <p style="margin-top:10px; margin-bottom:10px;">
            <img src="{{ asset('/img/icones/png/cinza-calendario.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
              TIPO/FREQUÊNCIA
            </span>
            <br>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              @if($Inscricao->experiencia->isEventoUnico) Evento Único
              @elseif ($Inscricao->experiencia->isEventoRecorrente) Evento Recorrente
              @elseif ($Inscricao->experiencia->isEventoServico) Evento Serviço
              @endif
            </span>
          </p>
          <p style="margin-top:10px; margin-bottom: 10px;">
            <img src="{{ asset('/img/icones/png/cinza-dinheiro.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
              PREÇO
            </span>
            <br>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              R${{ $Inscricao->experiencia->preco }}
            </span>
          </p>
          <p style="margin-top:10px; margin-bottom: 10px;">
            <img src="{{ asset('/img/icones/png/cinza-marcador-mapa.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
              LOCAL
            </span>
            <br>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              {{ ucfirst(trim($Inscricao->experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Inscricao->experiencia->local->estado->sigla)) }}
            </span>
          </p>
          <p style="margin-top:10px; margin-bottom: 10px;">
            <img src="{{ asset('/img/icones/png/cinza-streetview.png') }}" alt="{{ trans('global.date_date') }}" title="{{ trans('global.date_date') }}" style="vertical-align:top;" min-width="24px" width="24px" max-width="24px" min-height="24px" height="24px" max-height="24px"/>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:bolder; color:#545454; line-height:1.2em;">
              ENDEREÇO
            </span>
            <br>
            <span style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:14px; font-weight:normal; color:#545454; line-height:1.2em;">
              {{ ucfirst($Inscricao->experiencia->endereco_completo) }}
            </span>
          </p>
        </td>
      </tr>
      <!-- Fim da Seção INFORMAÇÕES DA EXPERIÊNCIA -->
      <!-- Seção DESCRIÇÃO DA EXPERIÊNCIA -->
      <tr>
        <td style="padding-bottom:30px;">
          <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
            Descrição Completa
          </h3>
          <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
            {{ trim($Inscricao->experiencia->descricao) }}
          </p>
        </td>
      </tr>
      <!-- Fim da Seção DESCRIÇÃO DA EXPERIÊNCIA -->
      <!-- Seção DETALHES DA EXPERIÊNCIA -->
      <tr>
        <td style="padding-bottom:30px;">
          <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
            Detalhes
          </h3>
          <p style="text-align:justify; font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:0;">
            {{ trim($Inscricao->experiencia->detalhes) }}
          </p>
        </td>
      </tr>
      <!-- Fim da Seção DETALHES DA EXPERIÊNCIA -->
      <!-- Seção DETALHES EXTRAS DA EXPERIÊNCIA -->
      @if(!empty($Experiencia->informacoes))
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:5px;">
              Informações Extras
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
      @else
        <tr>
          <td>
            <h3 style="font-family:'FuturaBT Bold', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:18px; font-weight:bolder; color:#545454; line-height:1.2em; margin-top:0; margin-bottom:0px;">
              Informações Extras
            </h3>
          </td>
        </tr>
        <tr>
          <td>
            <p style="font-family:'Avenir Roman', 'Trebuchet MS', Helvetica, Arial, sans-serif; font-size:16px; font-weight:200; color:#545454; line-height:1.2em; margin-top:7px; margin-bottom:30px;">
              Não há informações extras a serem exibidas.
            </p>
          </td>
        </tr>
      @endif
      <!-- Fim da Seção de DETALHES EXTRAS DA EXPERIÊNCIA -->
    @stop
