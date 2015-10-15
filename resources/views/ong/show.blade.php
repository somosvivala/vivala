@extends('cuidar')

@section('content')

	@if ( $ong->podeEditar )
	<a href="/ong/{{$ong->id}}/edit">
		<small>{{ trans('global.lbl_edit') }}/small>
	</a>
	@endif
	<h1 class="title">Ong {{ $ong->nome }}</h1>
	<img src="{{ $ong->getAvatarUrl() }}" alt="Foto da Ong">
@endsection
