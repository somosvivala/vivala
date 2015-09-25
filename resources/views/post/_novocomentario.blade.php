<div class="row novo-comentario">

	<div class="col-sm-2">
        <img class="foto-avatar-comentario" src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->entidadeAtiva->apelido }}">
    </div>
    <div class="col-sm-10">

		<!-- Adiciona a abertura do form -->
		{!! Form::open(['url' => ['comentario/savecomentario', $Post->id], 'method' => 'POST', 'class'=>'form-ajax', 'data-callback'=>'commentPost('.$Post->id.')']) !!}

		<!-- Adiciona um text field para o form-->
		<div class="form-group">
			{!! Form::text("conteudo", null,['class' => 'form-control', 'title'=> trans('global.lbl_comment'), 'aria-label'=> trans('global.lbl_comment'), 'placeholder'=> trans('global.lbl_commentr1')]) !!}
		</div>

		<!-- Adiciona submit button para o form -->
		<div class="form-group">
			{!! Form::submit(trans('global.lbl_publish'), ['class' => 'form-control btn btn-acao']) !!}
		</div>

		<!-- Fecha o form-->
		{!! Form::close() !!}
	</div>

</div>
