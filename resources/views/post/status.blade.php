<article class="status">
	<div class="hora-post"> {{ $Post->data_postagem_diff }} </div>
	<div class="row">
		<div class="col-sm-2">
			<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
			<div>{{$Post->entidade->apelido }}</div>
		</div>
		<div class="col-sm-10">
			<p class="status text-center">{{$Post->descricao}}</p>
		</div>
	</div>
	@include('post._barrainfos')
</article>
