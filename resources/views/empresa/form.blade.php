<!-- Adiciona um text field para o form-->
<div class="form-group">
	{!! Form::label("nome", trans('global.lbl_name')) !!}
	{!! Form::text("nome",  null , ['class' => 'form-control']) !!}
</div>

<!-- Adiciona um text field para o form-->
<div class="form-group">
	{!! Form::label("apelido", trans('global.lbl_nickname')) !!}
	{!! Form::text("apelido",  null , ['class' => 'form-control']) !!}
</div>

<!-- Adiciona um text field para o form, user PrettyUrl -->
<div class="form-group">
	{!! Form::label("url", trans('global.lbl_prettyURL')) !!}
	{!! Form::text("url", null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit( $btnSubmit, ['class' => 'form-control btn btn-acao']) !!}
</div>
