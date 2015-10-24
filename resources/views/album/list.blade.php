@extends('cuidar')

@section('content')
	<h4 class="suave">{{ trans('global.lbl_album_') }}</h4>

	<div class="panel-heading">
		<a href="/albums/create">{{ trans('global.lbl_album_create') }}</a>
	</div>

	<div class="panel">
		<div class="panel-heading">
			<h3>{{ trans('global.lbl_album_list_') }}</h3>
		</div>

		<div class="panel-body">
			@forelse($albums as $album)
	        <li class="fotos col-sm-12">
						<strong>{{ $album->nome }}</strong>
						<a href="/albums/{{$album->id}}/edit">{{ trans('global.lbl_edit') }}</a>
						<p>{{ $album->descricao }}</p>
						<ul>
							@forelse($album->fotos as $foto)
							<li><img src="{{$foto->path}}" alt="{{ trans('global.lbl_photo') }}"></li>

							@empty
							<p>{{ trans('global.lbl_photo_none') }}</p>

							@endforelse
						</ul>
	        </li>
				@empty
				    <p>{{ trans('global.lbl_album_none') }}</p>
			@endforelse
		</div>
	</div>

@endsection
