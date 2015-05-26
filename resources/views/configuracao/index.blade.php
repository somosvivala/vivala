@extends('app')

@section('content')
	
	<ul>
		<li>
			<a href="configuracao/create">Criar nova configuracão</a>
		</li>
	</ul>
	<div class="panel panel-default">
		<div class="panel-heading">
				<caption><h1 class="title">Configurações</h1></caption>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Indice</th>
						<th>Valor</th>
						<th>Created at</th>
						<th>Updated at</th>
					</tr>
				</thead>
				<tbody>
					@foreach($configuracoes as $configuracao)
						<tr>
							<td>{{ $configuracao->char_nome_configuracao }}</td>
							<td>{{ $configuracao->text_valor_configuracao }}</td>
							<td>{{ $configuracao->created_at }}</td>
							<td>{{ $configuracao->updated_at }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection