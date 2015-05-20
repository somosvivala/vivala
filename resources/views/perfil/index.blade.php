@extends('app')


@section('content')
	{{-- Provisorio --}}
	<h1 class="perfil-title">Perfil de: {{ $user->username }}
		<a href="perfil/editar">
				<small style='margin-left:25px; font-size:13px; color: #337ab7;'>Editar</small>
		</a>
	</h1>
@endsection
 