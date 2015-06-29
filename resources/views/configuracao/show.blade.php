@extends('app');

@section('content')
	<table class= "table-striped">
		<caption><h1 class="title">Configurações</h1></caption>
		<thead>
			<tr>
				<th class='col-md-4'>Indice</th>
				<th class='col-md-4'>Valor</th>
				<th class='col-md-4'>Created at</th>
				<th class='col-md-4'>Updated at</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $configuracao->char_nome_configuracao }}</td>
				<td>{{ $configuracao->text_valor_configuracao }}</td>
				<td>{{ $configuracao->created_at }}</td>
				<td>{{ $configuracao->updated_at }}</td>
			</tr>
		</tbody>
	</table>
@endsection