<div class="col-sm-12 cria-post-container">
    <div class="col-sm-2">
        <img class="foto-avatar" src="{{ Auth::user()->perfil->getAvatarUrl() }}" alt="{{ Auth::user()->username }}">
    </div>
    <div class="col-sm-10">
        <div class="row foto">
            <!-- Adiciona um formulario pra upload de foto-->
            <div class="jc_coords row col-sm-12">

                {!! Form::open(['url' => ['cropPhotoPost',  Auth::user()->id ], 'files' => true, 'onsubmit' => 'return verificaRecorteImagem(this);']) !!}

                    {!! Form::label("image_file_upload", "Escolha outra imagem:") !!}
                    {!! Form::file("image_file_upload", ['id' => 'image_file_upload']) !!}

                    {!! Form::hidden("x",  0, ['id' => 'xJcropPerfil']) !!}
                    {!! Form::hidden("y",  0, ['id' => 'yJcropPerfil']) !!}
                    {!! Form::hidden("w",  0, ['id' => 'wJcropPerfil']) !!}
                    {!! Form::hidden("h",  0, ['id' => 'hJcropPerfil']) !!}

                    <div class="erros">
                    </div>
                    {!! Form::submit("Recortar Imagem", ['class' => 'btn btn-primary']) !!}
                <img id="preview" />
                {!! Form::close() !!}
            </div>
        </div>

        {!! Form::open(['url' => 'post', 'class'=>'form-ajax']) !!}

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
