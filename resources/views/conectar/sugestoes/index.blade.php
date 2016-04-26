@extends('conectar')

@section('barra-topo')
    @include('perfil._barratopo')
@endsection

@section('content')
<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">
      {{ trans('global.lbl_traveller_suggest_to_follow') }}
    </h3>
    <ul class="filtro col-sm-12 margin-b-2">
        <li class="col-sm-3">{{ trans('global.lbl_filter_by') }} &gt;</li>
        <li class="col-sm-3"><a href="{{ url('sugestoesviajantes/amigo') }}" class="click-img-no-border">{{ trans('global.lbl_best_rank') }}</a></li>
        <li class="col-sm-3"><a href="{{ url('sugestoesviajantes/numseguidores') }}" class="click-img-no-border">{{ trans('global.lbl_follower_number') }}</a></li>
        <li class="col-sm-3"><a href="{{ url('sugestoesviajantes/seguindo') }}" class="click-img-no-border">{{ trans('global.lbl_follower_in_common') }}</a></li>
    </ul>
    <ul class="col-sm-12 sugestoes sugestoes-viajantes pagina-sugestoes">
        @if(isset($sugestoes))
        @forelse($sugestoes as $Perfil)
        <li class="col-sm-6">
            <div class="col-sm-4">
                {!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
                <button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Perfil->id }}">{{ trans('global.lbl_follow') }}</button>
                <a href="{{ url($Perfil->getUrl()) }}">
                            <div class="round foto quadrado3em">
                                <div class="avatar-img" style="background-image:url('{{ $Perfil->getAvatarUrl() }}')">
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
            <p>{{ trans('global.lbl_traveller_suggest_to_follow_no') }} :o</p>
        @endforelse
        @endif
    </ul>
</div>
@endsection
