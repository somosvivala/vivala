<h4 class="suave">
	Sugestão de viajantes
</h4>

<ul class="sugestoes sugestoes-viajantes">
	@if(isset($sugestoesViajantes))
	@forelse($sugestoesViajantes as $Perfil)
		<li>
			{!! Form::open(['url' => ['ajax/followperfil', $Perfil->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followPerfil('.$Perfil->id.')']) !!}
			<button name='btn_seguir' type="submit" class='btn_seguir_viajante' data-id="{{ $Perfil->id }}">seguir</button>
			<a href="{{ url($Perfil->getUrl()) }}">
				<div class="round foto">
					<div class="cover">
						<img src="{{ $Perfil->getAvatarUrl() }}" alt=" {{ $Perfil->nome }}">
					</div>
				</div>
				<strong class="col-sm-12">{{ $Perfil->user->username }}</strong>
				<div class="row localizacao-cidade">
					<div class="col-sm-4 text-right">
						<i class="fa fa-map-marker"></i>
					</div>
					<div class="col-sm-8 text-left">
						São Paulo, BR
					</div>
				</div>
			</a>
			{!! Form::close() !!}
		</li>
	@empty
	    <p>Sem viajantes pra seguir! :o</p>
	@endforelse
	@endif
</ul>
