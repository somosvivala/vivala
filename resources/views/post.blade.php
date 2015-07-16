<div class="row">
    <div class="col-sm-2">
        <img class="foto-avatar" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->username }}">
    </div>
    <div class="col-sm-10">
        <ul id="tipo-post" class="row lista-intervalo-preto">
            <li class="col-sm-2"><a href="#status">Status</a></li>
            <li class="col-sm-3"><a href="#foto">Adicionar Foto</a></li>
            <li class="col-sm-3"><a href="#video">Adicionar Vídeo</a></li>
            <li class="col-sm-2"><a href="#album">Criar Álbum</a></li>
            <li class="col-sm-2"><a href="#localizacao">Localização</a></li>
        </ul>
        {!! Form::open(['url' => 'post']) !!}

        {!! Form::textarea("url", null, ['title'=>'O que você quer compartilhar?', 'aria-label'=>'O que você quer compartilhar?', 'placeholder'=>'O que você quer compartilhar?', 'class'=>'col-sm-12']) !!}
        <div class="row">
            <div class="col-sm-10">
                <ul class="lista-intervalo-preto">
                    <li class="col-sm-4"><a href="#adicionar-roteiro">Adicionar Roteiro</a></li>
                    <li class="col-sm-4"><a href="#adicionar-diario">Adicionar Diário de Viagem</a></li>
                    <li class="col-sm-4"><a href="#marcar-amigos">Marcar Amigos</a></li>
                </ul>
            </div>

            {!! Form::submit( 'Publicar', ['class' => 'col-sm-2 btn btn-acao']) !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>
