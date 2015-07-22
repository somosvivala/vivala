<h4 class="suave">
	Empresas bacanas para seguir
</h4>
<ul class="sugestoes sugestoes-empresas">
	@if(isset($sugestoesEmpresas))
	@forelse($sugestoesEmpresas as $Empresa)
		<li>
			<!-- Adiciona a abertura do Form -->
			{!! Form::open(['url' => ['ajax/followempresa', $Empresa->id], 'class' => 'form-ajax', 'method' => 'GET']) !!}
				<button type="submit" class='btn_seguir_empresa' data-id="{{$Empresa->id}}">seguir</button>
				<a href="{{ url($Empresa->getUrl()) }}">
					<img class="hidden" title='Carregando' alt='Carregando...'>
					<div class="round foto">
						<div class="cover">
							<img src="{{ $Empresa->getAvatarUrl() }}"  alt="{{ $Empresa->nome }}">
						</div>
					</div>
					<strong class="col-sm-12">{{ $Empresa->nome }}</strong>
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
	    <p>Nenhuma empresa.</p>
	@endforelse
	@endif
</ul>
