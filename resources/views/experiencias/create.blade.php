@extends(Auth::user() ? 'mobiletemplate' : 'templatedeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="cadastrar-experiencia">
        <h2 class="col-sm-12">Cadastrar Experiência</h2>
            @include('errors.list')
            {!! Form::open(['url' => 'experiencias']) !!}
                @include('experiencias.form', ['textBtnSubmit' => 'Criar Experiência'])
            {!! Form::close() !!}

            {{-- incluindo a modal que edita a foto do owner da experiencia apos o form --}}
            @include('experiencias._owner_fotoform_modal')

    </div>
</div>
@endsection
