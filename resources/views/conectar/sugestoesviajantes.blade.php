<h4 class="suave">
	Sugestão de viajantes
</h4>

<ul class="sugestoes sugestoes-viajantes">
	@if(isset($sugestoesViajantes))
	@forelse($sugestoesViajantes as $Perfil)
		<li>
			<a href="/home">
				<button type="button">seguir</button>
				<div class="round foto">
					<div class="cover">
						<img src="{{ $Perfil->user->avatar }}">
					</div>
				</div>
				<strong class="col-sm-12">{{ $Perfil->nome }}</strong>
				<div class="row localizacao-cidade">
					<div class="col-sm-4 text-right">
						<i class="fa fa-map-marker"></i>
					</div>
					<div class="col-sm-8 text-left">
						São Paulo, BR
					</div>
				</div>
			</a>
		</li>
	@empty
	    <p>Sem viajantes pra seguir! :o</p>
	@endforelse
	@endif
</ul>
