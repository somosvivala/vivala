<div class="row novo-comentario">

	<div class="col-sm-2">
        <img class="foto-avatar" src="{{ Auth::user()->perfil->getAvatarUrl() }}" alt="{{ Auth::user()->username }}">
    </div>
    <div class="col-sm-10">
		<!-- Adiciona a abertura do Form -->
		{!! Form::open(['url' => ['comentario/savecomentario', $Post->id], 'method' => 'POST', 'class'=>'sem-form-ajax-por-enquanto', 'data-callback'=>'commentPost']) !!}

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
