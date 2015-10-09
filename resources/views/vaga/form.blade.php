<div id="ong-create-form" class="col-sm-12 form-ong">
    <div class="row">
        <!-- Título -->
        <h5 class="form-group col-sm-12">Informações</h5>
        <div class="form-group col-sm-12">
            {!! Form::select("ong", $ongs, ['title' => trans('global.ong_selecione_ong'), 'placeholder' => trans('global.ong_selecione_ong'), 'class' => 'form-control'], ['id' => 'ong_select']) !!}
        </div>
        <div class="form-group col-sm-12">
            {!! Form::textarea("habilidades", null, ['title'=> trans('global.lbl_cause_job_habilities_ph'), 'aria-label'=> trans('global.lbl_cause_job_habilities_ph'), 'placeholder'=> trans('quiz.lbl_cause_job_habilities'), 'class' => 'form-control' ]) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-12">
            {!! Form::textarea("sobre_trabalho", null, ['title'=> trans('global.lbl_cause_job_description_ph'), 'aria-label'=> trans('global.lbl_cause_job_description_ph'), 'placeholder'=> trans('quiz.lbl_cause_job_description'), 'class'=> 'form-control' ]) !!}
        </div>

        <!-- Horários de Funcionamento -->
        <div class="form-group col-sm-12">
            {!! Form::text("horario_funcionamento", null, ['title'=> trans('global.date_time_and_date'), 'aria-label'=> trans('global.date_time_and_date'), 'placeholder'=> trans('global.date_time_and_date'), 'class'=> 'form-control' ]) !!}
        </div>

        <div id="ong-dados-endereco" class="row">
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    {!! Form::text("cep", null, ['title' => trans('global.ong_address_zipcode'), 'placeholder' => trans('global.address_zipcode'), 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::text("logradouro",  null , ['title' => trans('global.ong_address_patio'), 'placeholder' => trans('global.address_street'), 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::text("complemento", null, ['title' => trans('global.ong_address_additional'), 'placeholder' => trans('global.address_additional'), 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::text("bairro",  null , ['title' => trans('global.ong_address_district'), 'placeholder' => trans('global.address_district'), 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::select("estado", $estados, ['title' => trans('global.ong_address_state'), 'placeholder' => trans('global.address_state'), 'class' => 'form-control'], ['id' => 'estado_select']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::select("cidade_id", [], ['title' => trans('global.ong_address_city'), 'placeholder' => trans('global.address_city'), 'class' => 'form-control', 'disabled' => 'true'], ['id' => 'cidade_select', 'disabled'=>'true']) !!}

                </div>
            </div>
        </div>
    </div>

        <!-- CATEGORIAS da causa -->
    <div id="causa-categorias" class="form-group row margin-t-2">
        <h5 class="col-sm-12">{{ trans('global.ong_t_onu_categories') }}</h5>
        <div class="row text-center">
            @if(isset($categoriasOngs))
            <ul class="cat-ong" class="col-sm-12">
                @foreach($categoriasOngs as $Categoria)
                <li id="cat-ong-{{$Categoria->id}}" class="col-sm-3">
                    <input type="radio" name="categoria_ong_id" value="{{$Categoria->id}}" id="categoria-ong-{{$Categoria->id}}" selected="">
                    <label for="categoria-ong-{{$Categoria->id}}">
                        <img src='../img/categorias-onu/cat-ong-{{$Categoria->id}}.png' alt='' title='' class='col-sm-12'/>
                    </label>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <div id="causa-contato" class="row margin-t-2">
        <h5 class="col-sm-12">Contato</h5>
        <div class="col-sm-6">
            {!! Form::text("telefone_contato",  null , ['title' => trans('global.ong_contact_telephone'), 'placeholder' => trans('global.ong_contact_telephone'), 'class' => 'form-control col-sm-6']) !!}
        </div>
    </div>

    <div class="row margin-t-1">
        <div class="col-sm-6">
            {!! Form::text("email_contato",  null , ['title'=> trans('global.ong_contact_email'), 'placeholder' => trans('global.ong_contact_email'), 'class' => 'form-control col-sm-6']) !!}
        </div>
    </div>

    <div id="causa-contato" class="row margin-t-2">
        <h5 class="col-sm-12">Imagem de capa</h5>
        <div class="col-sm-12">
        </div>
    </div>
    <div class="form-group text-center">
        {!! Form::submit( $btnSubmit, ['class' => 'btn btn-primary btn-acao']) !!}
    </div>
</div>
