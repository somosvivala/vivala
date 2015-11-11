<div id="modal-feedback" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-10"><h3 class="texto-preto">{{ trans('global.lbl_feedback_give_yours') }}</h3></div>
                    <div class="col-sm-2"><button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i></button></div>
                </div>
                {!! Form::open(['url' => '/paginas/feedback', 'method' => 'POST', 'id' => 'form-feedback', 'data-callback' => 'retornoFormFeedback', 'data-loading'=>'form-loading']) !!}

                {!! Form::select("tipo",
                    array(
                        trans('global.lbl_feedback_reporting_problem') => trans('global.lbl_feedback_reporting_problem'),
                        trans('global.lbl_feedback_complaint') => trans('global.lbl_feedback_complaint'),
                        trans('global.lbl_feedback_sugestion') => trans('global.lbl_feedback_sugestion'),
                        trans('global.lbl_feedback_compliment') => trans('global.lbl_feedback_compliment'),
                        trans('global.lbl_feedback_other') => trans('global.lbl_feedback_other')
                    ), null, ['class' => 'form-control margin-b-1', 'id' => 'tipofeedback_select']) !!}

               {!! Form::textarea("mensagem", null, ['title'=> trans('global.lbl_message'), 'aria-label'=> trans('global.lbl_message'), 'placeholder'=> trans('global.lbl_message'), 'class' => 'form-control sem-resize margin-b-1' ]) !!}

            </div>
            <div class="modal-footer">
                {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao pull-right']) !!}
                <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x margin-t-1" style="display:none"></i>
                {!! Form::close() !!}
             </div>
        </div>
    </div>
</div>
