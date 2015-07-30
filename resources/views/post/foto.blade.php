<article class="foto">
	<div class="hora-post"> {{ $Post->data_postagem_diff }} </div>
	<div class="row principal">
		<div class="col-sm-2">
			<div class="foto-label">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
			</div>
		</div>
		<div class="col-sm-10">
			@if($Post->fotos)
				<img class="foto-post" src="{{ $Post->fotos->path }}" alt="{{ $Post->titulo }}">
			@endif
			<p class="status text-center">"{{$Post->descricao}}"</p>
		</div>
	</div>
	@include('post._barrainfos')
</article>
