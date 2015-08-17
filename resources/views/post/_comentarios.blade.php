<div class="row comentarios">
	@if($Post->comentarios)
	@forelse($Post->comentarios as $Comentario)
        <li class="post col-sm-12 barra-comentarios" id="barra-comentario-{{ $Comentario->id }}">
			<div class="col-sm-2">
		        <img class="foto-avatar" src="{{ $Comentario->author->getAvatarUrl() }}" alt="{{ $Comentario->author->nome }}">
		    </div>
			<div class="col-sm-8">
				{{ $Comentario->conteudo }}
			</div>
			<div class="like col-sm-2">
				<a href="#comentario/likecomentario/{{ $Comentario->id }}" class="like-btn-comentario {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i></a>
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
