<div class="col-sm-12 cria-post-container fundo-cheio">
    <div class="col-sm-2">
        <img class="foto-avatar" src="{{ Auth::user()->entidadeAtiva->getAvatarUrl() }}" alt="{{ Auth::user()->entidadeAtiva->apelido }}">
    </div>
    <div class="col-sm-10">
        {!! Form::open(['url' => 'post', 'class'=>'']) !!}

            <ul class="row lista-intervalo-preto radio-hidden tipo-post-criar">
                <li class="col-sm-2">
                    <input type="radio" name="tipo_post" value="status" id="status" checked>
                    <label for="status">
                        {{trans("post.status")}}
                    </label>
                </li>
                <li class="col-sm-3">
                    <input type="radio" name="tipo_post" value="foto" id="foto">
                    <label for="foto">
                        {{trans("post.addphoto")}}
                    </label>
                </li>
                <li class="col-sm-3">
                    <input type="radio" name="tipo_post" value="video" id="video" disabled="disabled">
                    <label for="video">
                        {{trans("post.addvideo")}}
                    </label>
                </li>
                <li class="col-sm-2">
                    <input type="radio" name="tipo_post" value="album" id="album" disabled="disabled">
                    <label for="album">
                        {{trans("post.createalbum")}}
                    </label>
                </li>
                <li class="col-sm-2">
                    <input type="radio" name="tipo_post" value="localizacao" id="localizacao" disabled="disabled">
                    <label for="localizacao">
                        {{trans("post.localization")}}
                    </label>
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
                {!! Form::textarea("descricao", null, ['title'=> trans("post.shareph"), 'aria-label'=> trans("post.shareph"), 'placeholder'=> trans("post.shareph"), 'class' => 'sem-resize']) !!}
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <ul class="lista-intervalo-preto">
                        <li class="col-sm-4"><a href="#adicionar-roteiro" class="desativado">{{ trans("post.addroute") }}</a></li>
                        <li class="col-sm-5"><a href="#adicionar-diario" class="desativado">{{ trans("post.addjourneylog") }}</a></li>
                        <li class="col-sm-3"><a href="#marcar-amigos" class="desativado">{{ trans("post.tagfriends") }}</a></li>
                    </ul>
                </div>

                {!! Form::submit( trans("post.publish"), ['class' => 'col-sm-2 btn btn-acao']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
