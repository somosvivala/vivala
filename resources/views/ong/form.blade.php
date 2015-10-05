<!-- Adiciona um text field para o form-->
<div class="form-group"> 
	{!! Form::label("nome", "Nome:") !!}
	{!! Form::text("nome",  $nome, ['class' => 'form-control']) !!} 	
</div

@if(isset($categoriasOngs))
<div class="form-group"> 
    {!! Form::label("categoriaOng", "Categoria:") !!}
    <select name="categoria_ong_id" class="">
        <option value="null">Escolha uma categoria</option>
    @forelse($categoriasOngs as $Categoria)
        @if ($categoriaSelecionada == $Categoria->id)
            <option value="{{ $Categoria->id }}" selected="selected">{{ $Categoria->nome }}</option>
        @else
            <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
        @endif
    @empty
        <option>Sem categorias</option>
    @endforelse
    </select>
</div>
@endif


<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("apelido", "Apelido:") !!}
        {!! Form::text("apelido",  null , ['class' => 'form-control']) !!} 	
    </div>

    <!-- Adiciona um text field para o form, user PrettyUrl -->
    <div class="form-group col-sm-6"> 
            {!! Form::label("url", "Sua URL:") !!}
            {!! Form::text("url", null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="row">
    <div class="form-group col-sm-12"> 
        {!! Form::label("descricao", "Sobre:") !!}
	{!! Form::textarea("descricao", null, ['title'=> ("quiz.t_shortdesc"), 'aria-label'=>'Sobre', 'placeholder'=> trans("quiz.ph_shortdesc"), 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("horario_funcionamento", "Datas e horários:") !!}
	{!! Form::textarea("horario_funcionamento", null, ['title'=> ("quiz.t_shortdesc"), 'aria-label'=>'horario funcionamento', 'placeholder'=> trans("quiz.ph_shortdesc"), 'class'=> 'form-control' ]) !!}
    </div>

</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("logradouro", "Logradouro") !!}
        {!! Form::text("logradouro",  null , ['class' => 'form-control']) !!} 	
    </div>

    <!-- Adiciona um text field para o form, user PrettyUrl -->
    <div class="form-group col-sm-6"> 
            {!! Form::label("cep", "Seu CEP:") !!}
            {!! Form::text("cep", null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("bairro", "Bairro:") !!}
        {!! Form::text("bairro",  null , ['class' => 'form-control']) !!} 	
    </div>

    <!-- Adiciona um text field para o form, user PrettyUrl -->
    <div class="form-group col-sm-6"> 
            {!! Form::label("complemento", "Complemento") !!}
            {!! Form::text("complemento", null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group col-sm-6"> 
            {!! Form::label("estado", "Estado") !!}
            {!! Form::text("estado", null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6"> 
            {!! Form::label("cidade", "Cidade:") !!}
            {!! Form::text("cidade", null, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("url_facebook", "Pagina do Facebook:") !!}
        {!! Form::text("url_facebook",  null , ['class' => 'form-control']) !!} 	
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("url_gplus", "Pagina do Google+:") !!}
        {!! Form::text("url_gplus",  null , ['class' => 'form-control']) !!} 	
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("url_instagram", "Pagina do Instagram:") !!}
        {!! Form::text("url_instagram",  null , ['class' => 'form-control']) !!} 	
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("url_site", "Pagina da Ong:") !!}
        {!! Form::text("url_site",  null , ['class' => 'form-control']) !!} 	
    </div>
</div>

<div class="form-group text-right"> 
	{!! Form::submit( $btnSubmit, ['class' => 'btn btn-primary']) !!}
</div>
