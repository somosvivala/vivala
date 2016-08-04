<div id="modal-feedback" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('lbl_close') !!}">
              <span aria-hidden="true"><i class="fa fa-close"></i></span>
            </button>
            <h3 class="modal-title font-bold-upper text-center">
              {{ trans('global.lbl_feedback_give_yours') }}
            </h3>
          </div>
            <div class="modal-body">
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
                <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x margin-t-1 laranja" style="display:none"></i>
                {!! Form::close() !!}
             </div>
        </div>
    </div>
</div>
