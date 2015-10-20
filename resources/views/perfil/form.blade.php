<div id="perfil-create-form" class="col-sm-12 form-ong">

    <!-- DADOS BASE da ong -->
    <div id="ong-dados-base" class="row">
        <!-- Título -->
        <h5 class="form-group col-sm-12">{{ trans('global.lbl_perfil_edit') }}</h5>
        <!-- Nome -->
        <div class="form-group col-sm-12 ph-cor-cinza-escuro">
            {!! Form::text("apelido", $apelido, ['title' => trans('global.lbl_nickname'), 'placeholder' => trans('global.lbl_nickname'), 'class' => 'form-control']) !!}
        </div>
        <!-- PrettyURL -->
        <div class="form-group col-sm-12">
            <div class="row">
                <div class="col-sm-12 margin-b-1">
                    {!! Form::text("url", $perfil->getUrl(), ['title' => trans('global.lbl_prettyURL'), 'placeholder' => trans('global.lbl_prettyURL'), 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6 margin-b-1">
                    {!! Form::text("cidade_atual", $perfil->cidade_atual, ['title' => trans('global.lbl_city'), 'placeholder' => trans('global.lbl_city'), 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6 margin-b-1">
                    {!! Form::text("aniversario", $perfil->dataNascimento, ['title' => trans('global.lbl_birthday'), 'placeholder' => trans('global.lbl_birthday'), 'class' => 'form-control',"data-provide"=>"datepicker", "data-date-format"=>"dd/mm/yyyy"]) !!}
                </div>

                <div class="col-sm-6 ">
                    {!! Form::textarea("descricao_curta", $perfil->descricao_curta, ['title'=> trans("global.quiz_shortdesc"), 'aria-label'=> trans("global.quiz_shortdesc"), 'placeholder'=> trans("global.quiz_shortdesc_ph"), 'class'=> 'form-control sem-resize']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::textarea("descricao_longa", $perfil->descricao_longa, ['title'=> trans("global.quiz_longdesc"), 'aria-label'=> trans("global.quiz_longdesc"), 'placeholder'=> trans("global.quiz_longdesc_ph"), 'class'=> 'form-control sem-resize' ]) !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Botão Enviar -->
    <div id="ong-btn-submit" class="form-group text-center">
        {!! Form::submit($btnSubmit, ['class' => 'btn btn-acao']) !!}
    </div>
</div>
