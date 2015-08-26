<div class="row barra-post fundo-cheio" id="barra-post-{{ $Post->id }}">

	<div class="tag col-sm-4">
		<a href="#perfilcontroller/likepost/{{ $Post->id }}" class="like-btn"><i class="fa fa-tag {{ $Post->likedByMe() }}"></i></a>
		<span class="qtd-likes">

		</span>
	</div>
	<div class="like col-sm-2">
		<a href="#post/likepost/{{ $Post->id }}" class="like-btn {{ $Post->likedByMe() }}"><i class="fa fa-heart"></i></a>
		<span class="qtd-likes">
			@if($Post->getQuantidadeLikes() > 1)
				 {{ $Post->getQuantidadeLikes() }} Curtidas
			@elseif($Post->getQuantidadeLikes() == 1)
				 {{ $Post->getQuantidadeLikes() }} Curtida
			@else
				Curtir
			@endif
		</span>
	</div>
	<div class="comentario col-sm-2">
		<a href="#post/likepost/{{ $Post->id }}" class="like-btn"><i class="fa fa-comment {{ $Post->likedByMe() }}"></i></a>
		<span class="qtd-likes">
			0 Comentários
		</span>
	</div>
	<div class="share col-sm-2">
		<a href="#post/sharepost/{{ $Post->id }}" class="share-btn"><i class="fa fa-share"></i></a>
		<span class="qtd-likes">
			Compartilhar
		</span>
	</div>
</div>
