<h4 class="suave">
	Sugestão de ONGs para seguir
</h4>
<ul class="sugestoes sugestoes-ongs">

	@if(isset($sugestoesOngs))
	@forelse($sugestoesOngs as $Ong)
		<li>
			<a href="{{ url($Ong->getUrl()) }}">
				<button type="button" class='btn_seguir_ong' data-id="{{$Ong->id}}">seguir</button>
				<img class="hidden" title='Carregando' alt='Carregando...'>
				<div class="round foto">
					<div class="cover">
						<img src="{{ $Ong->getAvatarUrl() }}" alt=" {{ $Ong->nome }}">
					</div>
				</div>
				<strong class="col-sm-12">{{ $Ong->nome }}</strong>
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
	    <p>Nenhuma ong.</p>
	@endforelse
	@endif
</ul>
