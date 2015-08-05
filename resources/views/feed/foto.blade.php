<article class="foto">
	<div class="hora-post"> 
		<a href="/post/{{ $Post->id }}"> {{ $Post->data_postagem_diff }} </a> 
	</div>
	<div class="row principal foto-fundo"
	@if($Post->fotos)
	 style="background-image:url('{{ $Post->fotos->path }}')"
	@endif
	>
		<h4>{{ $Post->titulo }}</h4>

		<div class="col-sm-2">
			<div class="foto-label">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
			</div>
		</div>
	</div>
	@include('post._barrainfos')
	<div class="row box-post">
		<div class="col-sm-6 fundo-cheio">
			<p class="status text-center">{{$Post->descricao}}</p>
		</div>
		<div class="col-sm-6 fundo-cheio">
			@include('feed._comentarios')
			@include('post._novocomentario')
		</div>
	</div>
</article>
