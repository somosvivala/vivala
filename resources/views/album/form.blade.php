<!-- Adiciona um text field para o form-->
<div class="form-group">
	{!! Form::label("nome", trans('global.lbl_album_name')) !!}
	{!! Form::text("nome",  null , ['class' => 'form-control']) !!}
</div>

<!-- Adiciona um text field para o form, user PrettyUrl -->
<div class="form-group">
	{!! Form::label("descricao", trans('global.lbl_album_description')) !!}
	{!! Form::text("descricao", null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit( $btnSubmit, ['class' => 'form-control btn btn-primary btn-acao']) !!}
</div>
