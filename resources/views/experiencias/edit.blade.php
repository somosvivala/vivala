@extends(Auth::user() ? 'mobiletemplate' : 'templatedeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="editar-experiencia">
        <h2 class="col-sm-12">Editar Experiência</h2>
            @include('errors.list')

            {!! Form::model($experiencia, ['method' => 'PATCH', 'action' => ['ExperienciasController@update', $experiencia->id] ]) !!}

                @include('experiencias.form', ['textBtnSubmit' => 'Atualizar'])

            {!! Form::close() !!}

    </div>
</div>
@endsection
