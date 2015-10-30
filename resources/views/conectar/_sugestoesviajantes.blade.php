<h4 class="suave">{{ trans('global.lbl_traveller_suggest_') }}</h4>

<ul class="sugestoes sugestoes-viajantes">
	@if(isset($sugestoesViajantes))
	@forelse($sugestoesViajantes as $Perfil)
		<li>
			{!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
			<button name='btn_seguir' type="submit" class="btn_seguir_viajante click-img-no-border" data-id="{{ $Perfil->id }}">{{ trans('global.lbl_follow') }}</button>
			<a href="{{ url($Perfil->getUrl()) }}" class="click-img-no-border">
				<div class="round foto">
					<div class="cover">
						<img src="{{ $Perfil->getAvatarUrl() }}" alt=" {{ $Perfil->nome }}">
					</div>
				</div>
				<strong class="col-sm-12">{{ $Perfil->user->username }}</strong>
				{{-- <div class="row localizacao-cidade">
					<div class="col-sm-4 text-right">
						<i class="fa fa-map-marker"></i>
					</div>
					<div class="col-sm-8 text-left">
						São Paulo, BR
					</div>
				</div> --}}
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
<div class="row text-center">
	<a href="{{ url('sugestoesviajantes') }}" class="btn btn-acao click-img-no-border">{{ trans('global.lbl_seemore') }}</a>
</div><br>
@endif
