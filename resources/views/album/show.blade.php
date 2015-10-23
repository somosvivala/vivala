@extends('cuidar')

@section('content')
	{{-- @if ( $ong->podeEditar ) --}}
	<a href="/albums/{{$album->id}}/edit"><small>{{ trans('global.lbl_edit') }}</small></a>
	{{-- @endif --}}

	<h1 class="title">{{ $album->nome }}</h1>
	<p>{{ trans('global.lbl_description') }}: {{ $album->descricao }}</p>

	@forelse($album->fotos as $foto)
		<li class="fotos col-sm-12">
			<img src="{{  $foto->path }}" alt="{{ trans('global.lbl_photo') }}">
		</li>

	@empty
	    <p>{{ trans('global.lbl_album_without_photo_') }}</p>
	@endforelse

@endsection
