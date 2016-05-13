<ul class="list-group">
    @foreach ($Experiencias as $experiencia)
        <li class="list-group-item">
            <a href="/experiencias/editaFoto/{{ $experiencia->id }}">Editar Foto </a>
            <h3> {{ $experiencia->nome }} </h3>
        </li>
        <p>Nenhuma experiencia encontrada</p>
    @endforeach
</ul>
