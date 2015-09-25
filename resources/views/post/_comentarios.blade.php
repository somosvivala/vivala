<div class="row comentarios">
	@if($comentarios)
	@forelse($comentarios  as $Comentario)
      <li class="col-sm-12 post barra-comentarios" id="barra-comentario-{{ $Comentario->id }}">
			<div class="col-sm-2">
		        <img class="foto-avatar-comentario" src="{{ $Comentario->author->getAvatarUrl() }}" alt="{{ $Comentario->author->nome }}">
		    </div>
			<div class="col-sm-8">
				{{ $Comentario->conteudo }}
			</div>
			<div class="col-sm-2 like">
				<a href="#comentario/likecomentario/{{ $Comentario->id }}" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i></a>
				<span class="qtd-likes">
					@if($Comentario->getQuantidadeLikes() > 1)
						 {{ $Comentario->getQuantidadeLikes() }} {{ trans('global.lbl_like_') }}
					@elseif($Comentario->getQuantidadeLikes() == 1)
						 {{ $Comentario->getQuantidadeLikes() }} {{ trans('global.lbl_like') }}
					@else
						{{ trans('global.lbl_liker') }}
					@endif
				</span>
			</div>
        </li>
	@empty
	    <p class="col-sm-12">{{ trans('global.lbl_comment_no') }}</p>
	@endforelse
	@endif
</div>
