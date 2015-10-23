@extends('cuidar');

@section('content')
  <h1>{{ trans('global.lbl_album_edit') }}</h1>

	{{-- Adiciona um formulario pra upload de foto --}}
	<div class="jc_coords row col-sm-12">

  	{!! Form::model($album, ['files' => true, 'url' => ['/albums/update', $album->id] ]) !!}

    <div class="form-group fileupload-container">
      <input id="fileupload" type="file" name="foto" data-url="/foto/uploadphoto" multiple>
      <input id="fotos" type="hidden" name="fotos" value="">
      <div id="progress-photo-upload">
        <div class="bar" style="width: 0%;"></div>
      </div>
    </div>

  </div>

	@include('album.form', ['btnSubmit' => trans('global.lbl_album_update')]);
  {!! Form::close() !!}

  @include('errors.list')

@endsection
