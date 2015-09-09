<div class="row novo-comentario">

	<div class="col-sm-2">
        <img class="foto-avatar" src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->entidadeAtiva->apelido }}">
    </div>
    <div class="col-sm-10">
		<!-- Adiciona a abertura do Form -->
		{!! Form::open(['url' => ['comentario/savecomentario', $Post->id], 'method' => 'POST', 'class'=>'form-ajax', 'data-callback'=>'commentPost']) !!}

		<!-- Adiciona um text field para o form-->
		<div class="form-group">
			{!! Form::text("conteudo", null,['class' => 'form-control', 'placeholder'=>'Comentar...']) !!}
		</div>

		<!-- Adiciona submit button para o form -->
		<div class="form-group">
			{!! Form::submit("Enviar", ['class' => 'form-control btn btn-acao']) !!}
		</div>

		{!! Form::close() !!}
	</div>

</div>
