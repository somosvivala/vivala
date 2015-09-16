@extends('conectar')

@section('barra-topo')
    @include('perfil._barratopo')
@endsection

@section('content')
<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">
            Sugestão de viajantes para seguir
    </h3>
    <ul class="filtro col-sm-12">
        <li class="col-sm-3">Filtrar por &gt;</li>
        <li class="col-sm-3"><a href="{{ url('sugestoesviajantes/amigo') }}">Melhor classificação</a></li>
        <li class="col-sm-3"><a href="{{ url('sugestoesviajantes/numseguidores') }}">Número de seguidores</a></li>
        <li class="col-sm-3"><a href="{{ url('sugestoesviajantes/seguindo') }}">Seguidores em comum</a></li>
    </ul>
    <ul class="col-sm-12 sugestoes sugestoes-viajantes pagina-sugestoes">
        @if(isset($sugestoes))
        @forelse($sugestoes as $Perfil)
        <li class="col-sm-6">
            <div class="col-sm-4">
                {!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
                <button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Perfil->id }}">seguir</button>
                <a href="{{ url($Perfil->getUrl()) }}">
                    <div class="round foto">
                        <div class="cover">
                            <img src="{{ $Perfil->getAvatarUrl() }}" alt=" {{ $Perfil->nome }}">
                        </div>
                    </div>
                </a>
                {!! Form::close() !!}
            </div>
            <div class="col-sm-8 text-left">
                <a href="{{ url($Perfil->getUrl()) }}">
                    <strong>{{ $Perfil->apelido }}</strong>
                    <p>{{ $Perfil->descricao_curta}}</p>
                </a>
            </div>
        </li>
        @empty
            <p>Sem viajantes pra seguir! :o</p>
        @endforelse
        @endif
    </ul>   
</div>
@endsection
