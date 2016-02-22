<div class="row novo-comentario">

	<div class="col-sm-2">
            <div class="round foto quadrado3em">
                <div class="avatar-img" style="background-image:url('{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}')">
                    </div>
            </div>
    </div>
    <div class="col-sm-10">

		<!-- Adiciona a abertura do form -->
		{!! Form::open(['url' => ['comentario/savecomentario', $Post->id], 'method' => 'POST', 'class'=>'form-ajax', 'data-callback'=>'commentPost('.$Post->id.')', 'id' => 'form-comentario-post-'.$Post->id]) !!}

		<!-- Adiciona um text field para o form-->
		<div class="form-group">
                        {!! Form::textarea("conteudo", null, ['title'=> trans('global.lbl_comment'), 'aria-label'=> trans('global.lbl_commetn'), 'placeholder'=> trans('global.lbl_commentr1'), 'class' => 'sem-resize' ]) !!}
		</div>

		<!-- Adiciona submit button para o form -->
		<div class="form-group">
			{!! Form::submit(trans('global.lbl_commentr'), ['class' => 'alert text-right padding-btn font-bold-upper form-control']) !!}
		</div>

		<!-- Fecha o form-->
		{!! Form::close() !!}
	</div>

</div>
