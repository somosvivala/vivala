@extends('app')

@section('content')
	<ul>
		<li><a href="configuracao/create">{{ trans('global.lbl_setting_create') }}</a></li>
	</ul>
	<div class="panel panel-default">
		<div class="panel-heading">
				<caption><h1 class="title">{{ trans('global.lbl_setting_') }}</h1></caption>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>{{ trans('global.lbl_index') }}</th>
						<th>{{ trans('global.lbl_value') }}</th>
						<th>{{ trans('global.lbl_created_at') }}</th>
						<th>{{ trans('global.lbl_updated_at') }}</th>
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
