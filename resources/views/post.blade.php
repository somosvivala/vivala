<div class="col-sm-12 cria-post-container">
    <div class="col-sm-2">
        <img class="foto-avatar" src="{{ Auth::user()->perfil->getAvatarUrl() }}" alt="{{ Auth::user()->username }}">
    </div>
    <div class="col-sm-10">
        {!! Form::open(['url' => 'post', 'class'=>'']) !!}

            <ul class="row lista-intervalo-preto radio-hidden tipo-post-criar">
                <li class="col-sm-2">
                    <input type="radio" name="tipoPost" value="status" id="status" checked>
                    <label for="status">
                        Status
                    </label>
                </li>
                <li class="col-sm-3">
                    <input type="radio" name="tipoPost" value="foto" id="foto">
                    <label for="foto">
                        Adicionar Foto
                    </label>
                </li>
                <li class="col-sm-3">
                    <input type="radio" name="tipoPost" value="video" id="video">
                    <label for="video">
                        Adicionar Vídeo
                    </label>
                </li>
                <li class="col-sm-2">
                    <input type="radio" name="tipoPost" value="album" id="album">
                    <label for="album">
                        Criar Álbum
                    </label>
                </li>
                <li class="col-sm-2">
                    <input type="radio" name="tipoPost" value="localizacao" id="localizacao">
                    <label for="localizacao">
                        Localização
                    </label>
                </li>
            </ul>
            <div class="row adicionar-foto-container">
                <input id="fileupload" type="file" name="foto" data-url="/foto/uploadphoto" multiple>
                <input id="fotos" type="hidden" name="fotos" value="">
                <div id="progress-photo-upload">
                    <div class="bar" style="width: 0%;"></div>
                </div>
            </div>
            <div class="row">
                {!! Form::textarea("descricao", null, ['title'=>'O que você quer compartilhar?', 'aria-label'=>'O que você quer compartilhar?', 'placeholder'=>'O que você quer compartilhar?']) !!}
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <ul class="lista-intervalo-preto">
                        <li class="col-sm-4"><a href="#adicionar-roteiro">Adicionar Roteiro</a></li>
                        <li class="col-sm-5"><a href="#adicionar-diario">Adicionar Diário de Viagem</a></li>
                        <li class="col-sm-3"><a href="#marcar-amigos">Marcar Amigos</a></li>
                    </ul>
                </div>

                {!! Form::submit( 'Publicar', ['class' => 'col-sm-2 btn btn-acao']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
