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

    <!-- Horários de Funcionamento -->
    <div class="form-group col-sm-12">
    {!! Form::text("horario_funcionamento", null, ['title'=> trans('global.date_time_and_date'), 'aria-label'=> trans('global.date_time_and_date'), 'placeholder'=> trans('global.date_time_and_date'), 'class'=> 'form-control' ]) !!}
    </div>

    <div id="ong-dados-endereco" class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::text("cep", null, ['title' => trans('global.ong_address_zipcode'), 'placeholder' => trans('global.address_zipcode'), 'class' => 'form-control']) !!}
				</div>
		    <div class="form-group col-sm-6">
	      	{!! Form::text("logradouro",  null , ['title' => trans('global.ong_address_patio'), 'placeholder' => trans('global.address_street'), 'class' => 'form-control']) !!}
		    </div>
			</div>
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::text("complemento", null, ['title' => trans('global.ong_address_additional'), 'placeholder' => trans('global.address_additional'), 'class' => 'form-control']) !!}
				</div>
		    <div class="form-group col-sm-6">
	        {!! Form::text("bairro",  null , ['title' => trans('global.ong_address_district'), 'placeholder' => trans('global.address_district'), 'class' => 'form-control']) !!}
		    </div>
			</div>
		<div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::select("estado", $estados, ['title' => trans('global.ong_address_state'), 'placeholder' => trans('global.address_state'), 'class' => 'form-control'], ['id' => 'estado_select']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::select("cidade_id", [], ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city'), 'class' => 'form-control', 'disabled' => 'true'], ['id' => 'cidade_select', 'disabled'=>'true']) !!}

                </div>
            </div>
            </div>
	</div>


</div>

<div class="form-group text-right">
	{!! Form::submit( $btnSubmit, ['class' => 'btn btn-primary btn-acao']) !!}
</div>
