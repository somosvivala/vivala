@extends('mobiletemplate')

@section('content')

<div class="col-xs-12">
  @if(Auth::user())
    @include('_conhecalogado')
  @else
    <div class="row text-center header-mobile">
      <a href="{{ url('/conhecavivala') }}">
        <span>{!! trans('global.lbl_know_the') !!}</span>
        <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
      </a>
    </div>
  @endif
  <a href="{{ url('experiencias') }}" class="link-voltar">
    <i class="fa fa-chevron-left"></i>
  </a>

  <section class="experiencia">
        {!! Form::hidden('experiencia_tipo', $Experiencia->tipo) !!}
        {!! Form::hidden('experiencia_id', $Experiencia->id) !!}
        {!! Form::hidden('_token', csrf_token()) !!}
        {!! Form::hidden('user_logged_in', (Auth::user() != '') ) !!}

      <div class="nome-experiencia">
        <h1 class="col-xs-12 text-center negrito-exp">
          {{ mb_strtoupper(trim($Experiencia->nome)) }}
        </h1>
      </div>

      <div class="descricao">
          <span class="col-xs-12 negrito-exp text-center">
            R${{ trim($Experiencia->preco) }}
          </span>
          <span class="col-xs-12 negrito-exp text-center margin-b-1">
            <i class="fa fa-map-marker"></i> {{ ucfirst(trim($Experiencia->local->nome)) }} - {{ mb_strtoupper(trim($Experiencia->local->estado->sigla)) }}
          </span>
          <span class="descricao-inicial">
            {{ $Experiencia->descricao }}
          </span>
          <div class="owner text-center">
            <div class="round-foto-small">
              <img alt="{{ $Experiencia->owner_nome }}" src="{{ $Experiencia->fotoOwnerUrl }}">
            </div>
            <span>{{ mb_strtoupper(trim($Experiencia->owner_nome)) }}</span>
            <div class="row">

              @if($Experiencia->owner)
                @if($Experiencia->url_facebook_responsavel)
                  <a class="instituicao-rede-social" href="{{ $Experiencia->url_facebook_responsavel }}" target="_blank">
                    <span class="round-icone">
                      <i class="fa fa-facebook fa-inverse instituicao-rede-social-icone"></i>
                    </span>
                  </a>
                @endif
                @if($Experiencia->url_instagram_responsavel)
                  <a class="instituicao-rede-social" href="{{ $Experiencia->url_instagram_responsavel }}" target="_blank">
                      <span class="round-icone icone-instagram">
                      <i class="fa fa-instagram fa-inverse instituicao-rede-social-icone"></i>
                    </span>
                  </a>
                @endif
                @if($Experiencia->url_externa_responsavel)
                  <a class="instituicao-rede-social" href="{{ $Experiencia->url_externa_responsavel }}" target="_blank">
                    <span class="round-icone">
                      <i class="fa fa-link fa-inverse instituicao-rede-social-icone"></i>
                    </span>
                  </a>
                @endif
              @endif
            </div>
          </div>

          <span class="col-xs-12 negrito-exp margin-t-1">Data</span>
          <div class="col-xs-12 informacoes">
              <div class="row padding-t-1">
                  <span class="icone-informacoes"><i class="fa fa-clock-o"></i></span>
                  <span class="descricao-informacoes">{{ ucfirst(trim($Experiencia->frequencia)) }}</span>
              </div>
          </div>
          @if($Experiencia->isEventoUnico)
            <div class="col-xs-12 informacoes">
                <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                    <span class="descricao-informacoes">{{ $Experiencia->dataProximaOcorrencia }}</span>
                </div>
            </div>
          @endif
          @if($Experiencia->isEventoRecorrente)
            <div class="col-xs-12 informacoes">
                <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                    <span class="descricao-informacoes">
                        <input name="data-escolhida" placeholder="Escolha uma data" type="text" onfocus="(this.type='date')" class="clndr-picker" readonly>
                        <div class="clndr-container">
                        </div>
                        <input type="hidden" id="json-eventos" value='{{ $Experiencia->proximasOcorrenciasJSON }}'>
                    </span>
                </div>
            </div>
          @endif
          @if($Experiencia->isEventoServico)
            <div class="col-xs-12 informacoes">
                <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="fa fa-calendar"></i></span>
                    <span class="descricao-informacoes">
                        <input type="date" class="clndr-picker" placeholder="Escolha uma data" name="data-escolhida" readonly>
                        <div class="clndr-container">
                        </div>
                        <input type="hidden" id="json-eventos" value='{{ $Experiencia->diasOperacionaisJSON }}'>
                    </span>
                </div>
            </div>
          @endif
          <span class="col-xs-12 negrito-exp margin-t-2">Informações</span>
          @foreach($Experiencia->informacoes as $Informacao)
            <div class="col-xs-12 informacoes">
                <div class="row padding-t-1">
                    <span class="icone-informacoes"><i class="{{ $Informacao->icone }}"></i></span>
                    <span class="descricao-informacoes">{{ ucfirst(trim($Informacao->descricao)) }}</span>
                </div>
            </div>
          @endforeach
          @if($Experiencia->detalhes)
            <span class="col-xs-12 negrito-exp margin-t-2">Mais detalhes</span>
            <span class="col-xs-12 padding-t-1">
              {{ ucfirst(trim($Experiencia->detalhes)) }}
            </span>
          @endif
          @if($Experiencia->isUsuarioAtualInscrito)
              {!! Form::hidden('_token', csrf_token()) !!}
              <a class="btn-cancelar-inscricao col-xs-12" data-id-inscricao="{{ $Experiencia->getInscricaoUsuario(Auth::user())->id }}" href="#" onclick="confirmaUsuarioCancelaInscricaoExperiencia(event)"><i class="fa fa-times-circle-o"></i> Cancelar Inscrição</a>
          @endif
      </div>

      <div class="foto-experiencia margin-t-6">
          <div class="foto-img" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
              <div class="categorias-experiencia hide">
                <?php $contadorCategorias = 0; ?>
                @foreach($Experiencia->categorias as $Categoria)
                  <div class="icone">
                    <i class="{{ $Categoria->icone }}" title="{{ $Categoria->nome }}" alt="{{ $Categoria->nome }}"></i>
                  </div>
                  {{-- A img do mobile só comporta 5 ícones por vez na página interna --}}
                  @if(++$contadorCategorias === 5)
                    <?php break; ?>
                  @endif
                @endforeach
              </div>
          </div>
      </div>

      @if($Experiencia->isUsuarioAtualInscrito)
          <a class="btn-full-bottom-laranja" href="#" onclick="event.preventDefault();">{!! trans('global.lbl_subscribed') !!}</a>
      @else
          <a class="btn-full-bottom btn-inscrevase-experiencia" href="/experiencias/checkout/{{ $Experiencia->id }}">{!! trans('global.lbl_subscribe_yourself') !!}</a>
      @endif
  </section>
</div>
@endsection
