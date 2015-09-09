@extends('cuidar')

@section('content')
	{{-- @if ( $ong->podeEditar ) --}}
	<a href="/albums/{{$album->id}}/edit">
		<small>Editar</small>		
	</a>
	{{-- @endif --}}
	
	<h1 class="title">{{ $album->nome }}</h1>
	<p>Descricao: {{ $album->descricao }}</p>

	@forelse($album->fotos as $foto)
        <li class="fotos col-sm-12">
			<img src="{{  $foto->path }}" alt="Foto">
        </li>
	@empty
	    <p>Album sem fotos</p>
	@endforelse
@endsection
