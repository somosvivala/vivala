@extends('quiz.index')

@section('pergunta')
	<div id="tour-quiz" class="col-md-12 col-lg-12 pergunta quiz-3">
		<span class="absolute-top-right laranja">
			<a href="{{ url ('quiz/personalize')}}" class="absolute-top-left laranja">{{ trans("global.lbl_step_back") }}</a> | <a href="{{ url ('quiz/pessoasinteressantes')}}" class="laranja">{{ trans("global.lbl_step_skip") }}</a>
		</span>
		<div class="row">
			{!! Form::open(['url' => ['quiz/contemais',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => '/quiz/pessoasinteressantes', 'data-loading'=>'form-loading']) !!}
				<div class="erros">
				</div>
				{{-- Parte do SOBRE VOCÊ --}}
				<div class="row">
					<div class="col-sm-12 titulo margin-b-1">
						<h2 class="tour_quiz-3-step1">{{ trans("global.quiz_tell_us_more") }}</h2>
						<h3>{{ trans("global.quiz_get_intimacy") }}</h3>
					</div>
					<div class="col-sm-5">
						{!! Form::text("apelido", null, ['class' => 'form-control quiz-input', 'placeholder' => trans("global.quiz_nickname") ]) !!}
						{!! Form::text("cidade_natal", null, ['class' => 'form-control quiz-input', 'placeholder' => trans("global.quiz_hometown") ]) !!}
						{!! Form::text("cidade_atual", null, ['class' => 'form-control quiz-input', 'placeholder' => trans("global.quiz_currentcity") ]) !!}
						{{--
							{!! Form::text("data_aniversario", null, ['class' => 'form-control quiz-input', 'placeholder' => trans("global.quiz_birthdate") ]) !!}
						--}}
					</div>
					<div class="col-sm-7">
						{!! Form::textarea("descricao_curta", null, ['title'=> trans("global.quiz_shortdesc"), 'aria-label'=> trans("global.quiz_shortdesc"), 'placeholder'=> trans("global.quiz_shortdesc_ph"), 'class'=> 'form-control quiz-input sem-resize']) !!}
					</div>
				</div>
				{{-- Parte do REDES SOCIAIS
				<!-- div class="row margin-t-2">
					<div class="titulo col-sm-12">
						<h2 class="tour_quiz-3-step2">{{ trans("global.quiz_your_social_profiles") }}</h2>
						<h3 class="margin-b-1">{{ trans("global.quiz_be_connected") }}</h3>
					</div>
					<div class="col-sm-12">
		        <div class="form-group">
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="pretty-url-padd-l ph-cor-primaria">
		                        {!! Form::text("url_facebook", null, ['title' => trans('global.social_network_facebook'), 'placeholder' => trans('global.quiz_facebook_URL_ph'), 'class' => 'col-sm-6 form-control input-url-facebook pretty-url-no-border-l']) !!}
		                        {!! Form::label("url_facebook", trans('global.quiz_your_user_pretty_URL_ph'), ['class' => 'col-sm-6 prettyurl-input label-url label-url-facebook pretty-url-no-border-r']) !!}
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="pretty-url-padd-l ph-cor-primaria">
		                        {!! Form::text("url_instagram", null, ['title' => trans('global.social_network_instagram'), 'placeholder' => trans('global.quiz_instagram_URL_ph'), 'class' => 'col-sm-6 form-control input-url-gplus pretty-url-no-border-l']) !!}
		                        {!! Form::label("url_instagram", trans('global.quiz_your_user_pretty_URL_ph'), ['class' => 'col-sm-6 prettyurl-input label-url label-url-gplus pretty-url-no-border-r']) !!}
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="pretty-url-padd-l ph-cor-primaria">
		                        {!! Form::text("url_youtube", null, ['title' => trans('global.social_network_youtube'), 'placeholder' => trans('global.quiz_youtube_URL_ph'), 'class' => 'col-sm-6 form-control input-url-insta pretty-url-no-border-l',]) !!}
		                        {!! Form::label("url_youtube", trans('global.quiz_your_user_pretty_URL_ph'), ['class' => 'col-sm-6 prettyurl-input label-url label-url-insta pretty-url-no-border-r']) !!}
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="pretty-url-padd-l ph-cor-primaria">
		                        {!! Form::text("url_twitter", null, ['title' => trans('global.social_network_twitter'), 'placeholder' => trans('global.quiz_twitter_URL_ph'), 'class' => 'col-sm-6 form-control input-url-insta pretty-url-no-border-l',]) !!}
		                        {!! Form::label("url_twitter", trans('global.quiz_your_user_pretty_URL_ph'), ['class' => 'col-sm-6 prettyurl-input label-url label-url-insta pretty-url-no-border-r']) !!}
		                    </div>
		                </div>
		            </div>
		        </div>
					</div>
				</div-->
				--}}
				{{-- Parte do botão CONTINUAR--}}
				<div class="col-sm-12 margin-t-1">
					{!! Form::submit( trans("global.lbl_continue"), ['class' => 'btn btn-primario btn-acao']) !!}
          <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x laranja" style="display:none"></i>
				</div>
				{!! Form::close() !!}
		</div>
	</div>
@endsection
