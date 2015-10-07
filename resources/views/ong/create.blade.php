@extends('cuidar')


@section('content')
<div class="panel panel-default">

    <div class="panel-heading">
        <h1 class="text-center">{{ trans('global.lbl_ong_register') }}!</h1>
        <h5 class="text-center">{{ trans('global.ong_register_and_help_improve') }}</h5>
    </div>

    <div class="panel-body">
        {!! Form::open(['url' => 'ong']) !!}
        @include('ong.form', ['btnSubmit' => trans('global.lbl_ong_register')])
        {!! Form::close() !!}
    </div>

    @include('errors.list')

</div>
@endsection
