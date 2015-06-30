<h4 class="suave">
	Empresas bacanas para seguir
</h4>
<ul class="sugestoes sugestoes-empresas">
	@if(isset($sugestoesEmpresas))
	@forelse($sugestoesEmpresas as $empresa)
		<a href="{{ url($empresa->getUrl()) }}" title="{{ $empresa->nome }}">
			<img src="{{ $empresa->nome }}" alt="{{ $empresa->nome  }}">
		</a>
	@empty
	    <p>Nenhuma empresas.</p>
	@endforelse
	@endif
	<li>
		<a href="/home">
			<button type="button">seguir</button>
			<div class="round foto">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
			</div>
			<strong class="col-sm-12">Restaurante Dulce</strong>
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
	<li>
		<a href="/home">
			<button type="button" class="suave">seguindo</button>
			<div class="round foto">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
			</div>
			<strong class="col-sm-12">Restaurante Dulce</strong>
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
	<li>
		<a href="/home">
			<button type="button" class="">seguir</button>
			<div class="round foto">
				<div class="cover">
					<img src="/img/dummy.jpg">
				</div>
			</div>
			<strong class="col-sm-12">Restaurante Dulce</strong>
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
</ul>
