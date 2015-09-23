<div class="row">
    <div class="form-group col-sm-12"> 
        {!! Form::label("habilidades", "Habilidades necessárias:") !!}
	    {!! Form::textarea("habilidades", null, ['title'=> trans("quiz.t_shortdesc"), 'aria-label'=>'Sobre', 'placeholder'=> trans("quiz.ph_shortdesc"), 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6"> 
        {!! Form::label("sobre_trabalho", "Descricão sobre o trabalho:") !!}
	    {!! Form::textarea("sobre_trabalho", null, ['title'=> trans("quiz.t_shortdesc"), 'aria-label'=>'descricão sobre o trabalho', 'placeholder'=> trans("quiz.ph_shortdesc"), 'class'=> 'form-control' ]) !!}
    </div>

    <!-- Adiciona um text field para o form, user PrettyUrl -->
    <div class="form-group col-sm-6"> 
        {!! Form::label("local", "Localização:") !!}
	    {!! Form::textarea("local", null, ['title'=> trans("quiz.t_shortdesc"), 'aria-label'=>'Localização', 'placeholder'=> trans("quiz.ph_shortdesc"), 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="form-group text-right"> 
	{!! Form::submit( $btnSubmit, ['class' => 'btn btn-primary']) !!}
</div>
