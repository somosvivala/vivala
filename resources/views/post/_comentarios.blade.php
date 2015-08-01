<div class="row comentarios">
	@if($Post->comentarios)
	@forelse($Post->comentarios as $Comentario)
        <li class="post col-sm-12">
			<div class="col-sm-2">
		        <img class="foto-avatar" src="{{ $Comentario->author->getAvatarUrl() }}" alt="{{ $Comentario->author->nome }}">
		    </div>
			<div class="col-sm-8">
				{{ $Comentario->conteudo }}
			</div>
			<div class="col-sm-2">
				<a href="#perfilcontroller/likecomentario/{{ $Comentario->id }}" class="like-btn"><i class="fa fa-heart"></i></a>
			</div>
        </li>
	@empty
	    <p>Sem comentarios.</p>
	@endforelse
	@endif
</div>
