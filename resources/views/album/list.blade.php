@extends('cuidar')

@section('content')
	<h4 class="suave">
		Álbuns
	</h4>

	<div class="panel-heading">
		<a href="/albums/create">Criar Album</a>
	</div>

	<div class="panel">
		<div class="panel-heading">
			<h3>Listagem de albums</h3>
		</div>
			<div class="panel-body">
				@forelse($albums as $album)
			        <li class="fotos col-sm-12">
						<strong>{{ $album->nome }}</strong> <a href="/albums/{{$album->id}}/edit">Editar</a>
						<p>{{ $album->descricao }}</p>
						<ul>
							@forelse($album->fotos as $foto)
							<li><img src="{{$foto}}" alt="lalal"></li>
							@empty
							@endforelse
						</ul>
			        </li>
					@empty
					    <p>Nenhum album</p>
				@endforelse
			</div>
	</div>


@endsection