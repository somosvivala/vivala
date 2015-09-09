@extends('conectar')

@section('content')
	<ul class="lista-posts">
	    <li class="col-sm-12 post">
			@if($Post->tipo_post == 'status')
	        	@include('post.tipo.status')
			@elseif($Post->tipo_post == 'foto')
	        	@include('post.tipo.foto')
			@endif
	    </li>
	</ul>
@endsection
