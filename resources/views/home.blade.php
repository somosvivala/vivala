@extends('conectar')

@section('content')
{{-- TEMPORÁRIO TOUR INTRO --}}
<div id="tour-pilares" class="pilar-conectar">
	@include('post.create')
	@include('feed')
</div>
@endsection
