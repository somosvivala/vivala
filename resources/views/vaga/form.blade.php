<div class="row">
    <div class="form-group col-sm-12">
      {!! Form::label("habilidades", trans('global.lbl_cause_job_habilities')) !!}
	    {!! Form::textarea("habilidades", null, ['title'=> trans('global.lbl_cause_job_habilities_ph'), 'aria-label'=> trans('global.lbl_cause_job_habilities_ph'), 'placeholder'=> trans('quiz.ph_shortdesc'), 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
      {!! Form::label("sobre_trabalho", trans('global.lbl_cause_job_description')) !!}
	    {!! Form::textarea("sobre_trabalho", null, ['title'=> trans('global.lbl_cause_job_description_ph'), 'aria-label'=> trans('global.lbl_cause_job_description_ph'), 'placeholder'=> trans('quiz.ph_shortdesc'), 'class'=> 'form-control' ]) !!}
    </div>

    <!-- Adiciona um text field para o form, user PrettyUrl -->
    <div class="form-group col-sm-6">
      {!! Form::label("local", trans('global.lbl_cause_job_localization') !!}
	    {!! Form::textarea("local", null, ['title'=> trans('global.lbl_cause_job_localization_ph'), 'aria-label'=>trans('global.lbl_cause_job_localization_ph', 'placeholder'=> trans('quiz.ph_shortdesc'), 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="form-group text-right">
	{!! Form::submit( $btnSubmit, ['class' => 'btn btn-primary btn-acao']) !!}
</div>
