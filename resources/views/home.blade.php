@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
				<h1>Alô {{ Auth::user()->username }}</h1>
<h2> FacebookData </h2>
user_birthday:{{ $facebookData->user_birthday }}<br>
user_hometown:{{ $facebookData->user_hometown }}<br>
user_location:{{ $facebookData->user_location }}<br>
user_likes:{{ $facebookData->user_likes }}<br>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
