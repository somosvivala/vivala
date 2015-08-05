@extends('conectar')

@section('content')
	<ul class="lista-posts">
	    <li class="post col-sm-12">
			@if($Post->tipoPost == 'status')
	        	@include('post.tipo.status')
			@elseif($Post->tipoPost == 'foto')
	        	@include('post.tipo.foto')
			@endif
	    </li>
	</ul>
@endsection

