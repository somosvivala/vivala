@extends('cuidar')

@section('content')
<div class="panel panel-default">

    <div class="form-ong-head">
        <h3 class="text-center margin-t-2">{{ trans('global.lbl_ong_register') }}!</h3>
        <h5 class="text-center margin-b-2">{{ trans('global.ong_register_and_help_improve') }}</h5>
    </div>

    <div class="panel-body">
        {!! Form::open(['url' => 'ong']) !!}
        @include('ong.form', ['btnSubmit' => trans('global.lbl_ong_register')])
        {!! Form::close() !!}
    </div>

    @include('errors.list')

</div>
@endsection
