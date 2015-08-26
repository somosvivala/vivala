<article class="status">
	<div class="row principal">
		<div class="col-sm-2">
			<div class="foto-label">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
			</div>
		</div>
		<div class="col-sm-10">
			<p class="status text-center">"{{$Post->descricao}}"</p>
		</div>
	</div>
	<div class="hora-post"> 
		<a href="/post/{{ $Post->id }}"> {{ $Post->data_postagem_diff }} </a> 
	</div>
	@include('post._barrainfos')
		<div class="row box-post">
			<div class="col-sm-6 fundo-cheio">
				@include('feed._comentarios')
			</div>
			<div class="col-sm-6 fundo-cheio">
				@include('post._novocomentario')
			</div>
		</div>
	</div>
</article>