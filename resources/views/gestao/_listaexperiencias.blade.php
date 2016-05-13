<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">
    <div class="row" >
        <h2> Listagem de experiencias </h2>

        <ul class="list-group">
            @foreach ($Experiencias as $experiencia)
                <li class="list-group-item col-xs-12">
                    <div class="col-xs-2">
                        <a href="/experiencias/editaFoto/{{ $experiencia->id }}">Editar Foto </a>
                    </div>
                    <div class="col-xs-4">
                        <p> {{ $experiencia->titulo }} </p>
                    </div>
                     <div class="col-xs-6">
                        <p> {{ $experiencia->descricao }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
