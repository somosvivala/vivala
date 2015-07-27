<div class="col-sm-12 " id="barra-post-{{ $Post->id }}">
	<a href="#perfilcontroller/likepost/{{ $Post->id }}" class="like-btn"><i class="fa fa-heart"></i></a>
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
