@extends(Auth::user() ? 'mobiletemplate' : 'templatedeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    @include('experiencias.categorias._navbar')

    <div class="padding-b-1" id="cadastrar-categoria-experiencia">
        <h2 class="col-sm-12">Editar Categoria de Experiências</h2>
            @include('errors.list')

            {!! Form::model($Categoria, ['method' => 'PATCH', 'url' => ['categorias/experiencias', $Categoria->id] ]) !!}

                @include('experiencias.categorias.form', ['textBtnSubmit' => 'Atualizar Categoria'])

            {!! Form::close() !!}
    </div>


</div>
@endsection
