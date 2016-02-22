<div class="col-xs-12 col-sm-12 cria-post-container fundo-cheio tour-pilar-conectar-step2">
    <div class="col-md-2 col-sm-4 col-xs-3">
        <a href="{{ url('perfil') }}" class="click-img-no-border">
            <div class="round foto quadrado7em">
                <div class="avatar-img" style="background-image:url('{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}')">
                    </div>
            </div>
        </a>
    </div>
    <div class="col-md-10 col-sm-8 col-xs-9">
        {!! Form::open(['url' => 'post', 'class'=>'']) !!}
            <ul class="row lista-intervalo-preto radio-hidden tipo-post-criar">
                <li class="col-xs-2 col-sm-4 col-md-2">
                    <input type="radio" name="tipo_post" value="status" id="status" checked>
                    <label for="status">
                        {{ trans('global.lbl_status') }}
                    </label>
                </li>
                <li class="col-xs-7 col-sm-7 col-md-3">
                    <input type="radio" name="tipo_post" value="foto" id="foto">
                    <label for="foto">{{ trans('global.lbl_photo_add') }}</label>
                </li>
                <li class="hidden-xs hidden-sm col-md-3">
                    <input type="radio" name="tipo_post" value="video" id="video" disabled="disabled">
                    <label for="video">{{ trans('global.lbl_video_add')}}</label>
                </li>
                <li class="hidden-xs hidden-sm col-md-2">
                    <input type="radio" name="tipo_post" value="album" id="album" disabled="disabled">
                    <label for="album">{{ trans('global.lbl_album_create') }}</label>
                </li>
                <li class="hidden-xs hidden-sm col-md-2">
                    <input type="radio" name="tipo_post" value="localizacao" id="localizacao" disabled="disabled">
                    <label for="localizacao">{{trans('global.lbl_localization')}}</label>
                </li>
            </ul>
            <div class="row adicionar-foto-container">
                <input class="fileupload" type="file" name="foto" data-url="/foto/uploadphoto" multiple>
                <input id="fotos" type="hidden" name="fotos" value="">
                <div id="progress-photo-upload">
                    <div class="bar" style="width: 0%;"></div>
                </div>
            </div>
            <div class="row">
                {!! Form::textarea("descricao", null, ['title'=> trans('global.lbl_commentr2'), 'aria-label'=> trans('global.lbl_share'), 'placeholder'=> trans('global.lbl_share'), 'class' => 'sem-resize']) !!}
            </div>
            <div class="row padding-t-1">
                <div class="hidden-xs hidden-sm col-md-10 padding-t-1">
                    <ul class="lista-intervalo-preto">
                      <li class="col-xs-4 col-sm-4"><a class="cinza-morto" href="javascript:void(0)">{{ trans('global.lbl_travel_guide_add') }}</a></li>
                      <li class="col-xs-5 col-sm-5"><a class="cinza-morto" href="javascript:void(0)">{{ trans('global.lbl_travel_log_add') }}</a></li>
                      <li class="col-xs-3 col-sm-3"><a class="cinza-morto" href="javascript:void(0)">{{ trans('global.lbl_tag_friends') }}</a></li>
                    </ul>
                </div>
                {!! Form::submit( trans('global.lbl_publish'), ['class' => 'col-xs-4 pull-right col-md-2 btn btn-acao']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
