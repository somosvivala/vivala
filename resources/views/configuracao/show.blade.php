@extends('app');

@section('content')
	<table class= "table-striped">
		<caption><h1 class="title">{{ trans('global.lbl_setting_') }}</h1></caption>
		<thead>
			<tr>
				<th class='col-md-4'>{{ trans('global.lbl_index') }}</th>
				<th class='col-md-4'>{{ trans('global.lbl_value') }}</th>
				<th class='col-md-4'>{{ trans('global.lbl_created_at') }}</th>
				<th class='col-md-4'>{{ trans('global.lbl_updated_at') }}</th>
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
