<!-- Adiciona um text field para o form-->
<div class="form-group"> 
	{!! Form::label("nome", "Nome:") !!}
	{!! Form::text("nome",  null , ['class' => 'form-control']) !!} 	
</div>

@if(isset($categoriasOngs))
<div class="form-group"> 
    {!! Form::label("categoriaOng", "Categoria:") !!}
    <select name="categoriaOng" class="">
        <option value="null">Escolha uma categoria</option>
    @forelse($categoriasOngs as $Categoria)
        <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
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

    <!-- Adiciona um text field para o form, user PrettyUrl -->
    <div class="form-group col-sm-6"> 
        {!! Form::label("local", "Localização:") !!}
	{!! Form::textarea("local", null, ['title'=> ("quiz.t_shortdesc"), 'aria-label'=>'Localização', 'placeholder'=> trans("quiz.ph_shortdesc"), 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="form-group text-right"> 
	{!! Form::submit( $btnSubmit, ['class' => 'btn btn-primary']) !!}
</div>
