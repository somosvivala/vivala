<!-- Adiciona um text field para o form-->
<div class="form-group"> 
	{!! Form::label("nome", "Nome do album:") !!}
	{!! Form::text("nome",  null , ['class' => 'form-control']) !!} 	
</div>

<!-- Adiciona um text field para o form, user PrettyUrl -->
<div class="form-group"> 
	{!! Form::label("descricao", "Descricao:") !!}
	{!! Form::text("descricao", null, ['class' => 'form-control']) !!}
</div>

<div class="form-group"> 
	{!! Form::submit( $btnSubmit, ['class' => 'form-control btn btn-primary']) !!}
</div>
