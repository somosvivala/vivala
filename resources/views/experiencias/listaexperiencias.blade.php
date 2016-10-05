@extends('mobiletemplate')

@section('content')

<div class="col-xs-12">
  @if(Auth::user())
    @include('_conhecalogado')
  @else
    <div class="row text-center header-mobile">
      <a href="{{ url('/conhecavivala') }}">
        <span>{!! trans('global.lbl_know_the') !!}</span> <img src="{{ asset('vivala-logo-branco.svg') }}" alt="{{ trans('global.title_vivala') }}" title="{{ trans('global.title_vivala') }}" />
       </a>
    </div>
  @endif

  <h1 class="titulo-mobile">{!! trans('global.lbl_experience_') !!}</h1>
  <ul class="padding-b-1 lista-foto-descricao">
      @foreach($experiencias as $k=>$Experiencia)
      <li class="row">
          <a href="/experiencias/{{ $Experiencia->id}}">
              <div class="{{ $k%2==0?'direita':'esquerda'}} foto">
                  <div class="foto-img" style="background-image:url('{{ $Experiencia->fotoCapaUrl}}')">
                      <div class="categorias-experiencia hide">
                        <?php $contadorCategorias = 0; ?>
                        @foreach($Experiencia->categorias as $Categoria)
                          <div class="icone">
                            <i class="{{ $Categoria->icone }}"></i>
                          </div>
                          {{-- A img do mobile só comporta 6 ícones por vez na listagem --}}
                          @if(++$contadorCategorias === 6)
                            <?php break; ?>
                          @endif
                        @endforeach
                      </div>
                      <div class="nome-experiencia">
                        <span>{{ mb_strtoupper(trim($Experiencia->nome)) }}</span>
                      </div>
                  </div>
                  {{-- DESATIVADO
                    <img class="col-sm-6" src="{{ $Experiencia->foto }}" alt="{{ $Experiencia->titulo }}">
                  --}}
              </div>
              <div class="{{ $k%2!=0?'direita':'esquerda'}} descricao">
                  <div class="container">
                      <div class="row negrito-exp">R${{ trim($Experiencia->preco) }}</div>
                      <div class="row cidade negrito-exp"><i class="fa fa-map-marker"></i> {{ $Experiencia->local->estado->nome }}</div>
                      <span class="pull-left margin-t-1">{{ $Experiencia->descricao_na_listagem }}</span>
                  </div>
              </div>
          </a>
      </li>
      @endforeach
  </ul>
  {{--
  <div class="barra-bottom text-center">
      <button class="icone-bottom">
          <i class="fa fa-bars"></i>
          <span>Filtrar</span>
      </button>
  </div>
  --}}
</div>
@endsection
