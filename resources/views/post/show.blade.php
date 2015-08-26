@extends('conectar')

@section('content')
	<ul class="lista-posts">
	    <li class="post col-sm-12">
			@if($Post->tipo_post == 'status')
	        	@include('post.tipo.status')
			@elseif($Post->tipo_post == 'foto')
	        	@include('post.tipo.foto')
			@endif
	    </li>
	</ul>
@endsection

