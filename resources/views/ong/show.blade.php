@extends('app');

@section('content')
	<table class= "table-striped">
		<caption><h1 class="title">Ong</h1></caption>
		<thead>
			<tr>
				<th class='col-md-12'>Nome</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $ong->nome }}</td>
			</tr>
		</tbody>
	</table>
@endsection