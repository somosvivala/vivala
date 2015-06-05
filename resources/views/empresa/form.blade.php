<!-- Adiciona um text field para o form-->
<div class="form-group"> 
	{!! Form::label("nome", "Nome:") !!}
	{!! Form::text("nome",  null , ['class' => 'form-control']) !!} 	
</div>

<!-- Adiciona um text field para o form, user PrettyUrl -->
<div class="form-group"> 
	{!! Form::label("url", "Sua URL:") !!}
	{!! Form::text("url", null, ['class' => 'form-control']) !!}
</div>

<div class="form-group"> 
	{!! Form::submit("Cadastrar Empresa", ['class' => 'form-control btn btn-primary']) !!}
</div>