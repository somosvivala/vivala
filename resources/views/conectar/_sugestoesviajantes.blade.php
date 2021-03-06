<div class="margin-b-2">
	<h4 class="suave tour-pilar-conectar-step5">
		{{ trans('global.lbl_traveller_suggest_') }}
	</h4>
</div>

<ul class="sugestoes sugestoes-viajantes">
  @if(isset($sugestoesViajantes))
  @forelse($sugestoesViajantes as $Perfil)
		<li class="margin-b-1">
      {!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
      <button name='btn_seguir' type="submit" class="btn_seguir_viajante click-img-no-border" data-id="{{ $Perfil->id }}">{{ trans('global.lbl_follow') }}</button>
      <a href="{{ url($Perfil->getUrl()) }}" class="click-img-no-border">
        <div class="round foto quadrado3em">
            <div class="avatar-img" style="background-image:url('{{ $Perfil->getAvatarUrl() }}')"></div>
        </div>
        <strong class="col-sm-12">{{ $Perfil->apelido_tratado }}</strong>
      </a>
      {!! Form::close() !!}
    </li>
  @empty
      <p>{{ trans('global.lbl_traveller_suggest_to_follow_no') }} :o</p>
  @endforelse
  @endif
</ul>

@if (Auth::user()->entidadeAtiva->tipo == 'ong')
@else
<div class="row text-center margin-b-2">
	<a href="{{ url('sugestoesviajantes') }}" class="btn btn-acao btn-viajantes-fix click-img-no-border">
		{{ trans('global.lbl_seemore') }}
	</a>
</div>
<br>
@endif
