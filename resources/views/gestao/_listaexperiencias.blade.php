<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">
    <div class="row" >
        <h2> Listagem de experiencias </h2>

        <ul class="list-group">
            @foreach ($Experiencias as $experiencia)
                <li class="list-group-item col-xs-12 experiencia-item" data-id="{{ $experiencia->id }}">
                    <div class="col-xs-2">
                        <a class="col-xs-12" href="/experiencias/editafoto/{{ $experiencia->id }}">Editar Foto </a>
                        <a class="col-xs-12" href="/experiencias/{{ $experiencia->id }}/edit">Editar Experiencia </a>
                        <a class="col-xs-12" href="#" onclick="confirmaDeleteExperiencia(event)">Deletar Experiencia </a>
                    </div>
                    <div class="col-xs-2">
                        <div class="round foto quadrado3em">
                            <div class="avatar-img" style="background-image:url('{{ $experiencia->fotoCapaUrl }}')"></div>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <p> R${{ $experiencia->preco}} </p>
                    </div>
                     <div class="col-xs-2">
                        <p> {{ $experiencia->local->nome }} </p>
                    </div>
                     <div class="col-xs-2">
                        <p> {{ $experiencia->descricao }} </p>
                    </div>
                     <div class="col-xs-2">
                        <div class="col-xs-12">
                            <p>Categorias:</p>
                        </div>
                        <ul class="col-xs-12">
                        @foreach ($experiencia->categorias as $categoria)
                            <li class="">
                                <i class="fa fa-circle"></i> &nbsp; {{ $categoria->nome }}
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
