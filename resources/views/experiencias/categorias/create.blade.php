
@extends(Auth::user() ? 'mobilelogado' : 'mobiledeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    @include('experiencias.categorias._navbar')

    <div class="padding-b-1" id="cadastrar-categoria-experiencia">
        <h2 class="col-sm-12">Cadastrar Categoria de Experiências</h2>
            @include('errors.list')

            {!! Form::open(['url' => 'categorias/experiencias']) !!}

                @include('experiencias.categorias.form', ['textBtnSubmit' => 'Criar Categoria'])

            {!! Form::close() !!}
    </div>


</div>
@endsection
