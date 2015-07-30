<article class="status">
	<div class="hora-post"> {{ $Post->data_postagem_diff }} </div>
	<div class="row principal">
		<div class="col-sm-2">
			<div class="foto-label">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
			</div>
		</div>
		<div class="col-sm-10">
			<p class="status text-center">"{{$Post->descricao}}"</p>
			<div>
				<button type='button' class="ReplyBtn">Comentar</button>
				<div class="col-sm-12 hidden comment_wrapper">
				<!-- Adiciona a abertura do Form -->
				{!! Form::open(['url' => ['comentario/savecomentario', $Post->id], 'method' => 'POST', 'class'=>'form-ajax']) !!}

				<!-- Adiciona um text field para o form-->
				<div class="form-group"> 
					{!! Form::text("conteudo", null,['class' => 'form-control']) !!}
				</div>

				<!-- Adiciona submit button para o form -->
				<div class="form-group"> 
					{!! Form::submit("Submit", ['class' => 'form-control btn btn-primary']) !!}
				</div>

				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	@include('post._barrainfos')
</article>
