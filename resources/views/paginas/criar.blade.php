@extends('conectar')

@section('content')

<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center">
        Criar página 
    </h3>

    <div class="col-sm-4">
        <div class="box-criar">
            <img src="/images/iconcriarempresa.png" alt="Criar Empresa">
            <h4>Empresa</h4>
        </div>
        <div class="form-criar">
            {!! Form::open(array('url' => array('empresa/create')))!!}
            <span> Junte-se as pessoas que apoiam você na Vivalá! </span>
            {!! Form::submit('Começar') !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    </div>

</div>
@endsection
