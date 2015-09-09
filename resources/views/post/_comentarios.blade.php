<div class="row comentarios">
	@if($Post->comentariosByDate())
	@forelse($Post->comentariosByDate()  as $Comentario)
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
						 {{ $Comentario->getQuantidadeLikes() }} Curtidas
					@elseif($Comentario->getQuantidadeLikes() == 1)
						 {{ $Comentario->getQuantidadeLikes() }} Curtida
					@else
						Curtir
					@endif
				</span>
			</div>
        </li>
	@empty
	    <p>Sem comentarios.</p>
	@endforelse
	@endif
</div>
