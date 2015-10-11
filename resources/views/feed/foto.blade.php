<article class="foto">
	<div class="hora-post">
		<a href="/post/{{ $Post->id }}"> {{ $Post->data_postagem_diff }} </a>
	</div>

        <div class="col-sm-2 margin-t-2">
                <div class="foto-label">
                    <a href="{{ url($Post->entidade->getUrl()) }}">
                        <img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
                        <div class="titulo-label">{{$Post->entidade->apelido }}</div>
                    </a>
                </div>
        </div>
	@if($Post->fotos)
	<a href="{{$Post->fotos->path}}" data-lightbox="foto-{{ $Post->id }}" data-title="{{ $Post->titulo }}">
	@endif

	<div class="row principal foto-fundo"
	@if($Post->fotos)
	 style="background-image:url('{{ $Post->fotos->path }}')"
	@endif
	>
		<h4>{{ $Post->titulo }}</h4>

	</div>
	@if($Post->fotos)
</a>
	@endif

	@include('post._barrainfos')
	<div class="row box-post">
		<div class="col-sm-6 fundo-cheio">
			<p class="status text-center">{{$Post->descricao}}</p>
		</div>
		<div class="col-sm-6 fundo-cheio">
			<div class="comentarios-wrapper">
				@include('feed._comentarios', ["qtdComentariosExibicao" => 2])
			</div>
			@include('post._novocomentario')
		</div>
	</div>
</article>
