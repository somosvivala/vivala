<div class="row comentarios">
	@if($Post->novosComentariosByDate($qtdComentariosExibicao))
	@forelse($Post->novosComentariosByDate($qtdComentariosExibicao) as $Comentario)
        <li class="col-sm-12 post barra-comentarios" id="barra-comentario-{{ $Comentario->id }}">
			<div class="col-sm-2">
		        <img class="foto-avatar" src="{{ $Comentario->author->getAvatarUrl() }}" alt="{{ $Comentario->author->nome }}">
		    </div>
			<div class="col-sm-8">
				{{ $Comentario->conteudo }}
			</div>
			<div class="col-sm-2 like">
				<a href="#comentario/likecomentario/{{ $Comentario->id }}" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i></a>
				<span class="qtd-likes">
					@if($Comentario->getQuantidadeLikes() > 1)
						 {{ $Comentario->getQuantidadeLikes() }} {{ trans("post.likes") }}
					@elseif($Comentario->getQuantidadeLikes() == 1)
						 {{ $Comentario->getQuantidadeLikes() }} {{ trans("post.like") }}
					@else
						{{ trans("post.liker") }}
					@endif
				</span>
			</div>
        </li>
	@empty
	    <p>{{ trans("post.nocomments") }}</p>
	@endforelse
	@endif
</div>
