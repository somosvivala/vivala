<article class="status">
	<div class="hora-post"> {{ $Post->data_postagem_diff }} </div>
	<div class="row principal">
		<div class="col-sm-2">
			<div class="foto-label">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
			</div>
		</div>
		<div class="col-sm-10">
			<p class="status text-center">"{{$Post->descricao}}"</p>
		</div>
	</div>
	@include('post._barrainfos')
</article>
