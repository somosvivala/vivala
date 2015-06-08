@extends('app')

@section('content')

	@if ( $empresa->podeEditar )
	<a href="/empresa/{{$empresa->id}}/edit">
		<small>Editar</small>		
	</a>
	@endif
	<table class= "table-striped">
		<caption><h1 class="title">Empresa</h1></caption>
		<thead>
			<tr>
				<th class='col-md-12'>Nome</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $empresa->nome }}</td>
			</tr>
		</tbody>
	</table>
@endsection