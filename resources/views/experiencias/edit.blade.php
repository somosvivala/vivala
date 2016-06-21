@extends(Auth::user() ? 'mobiletemplate' : 'templatedeslogado')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 fundo-cheio">

    <div class="padding-b-1" id="editar-experiencia">
        <h2 class="col-sm-12">Editar Experiência</h2>
            @include('errors.list')
            <div class="round-foto-sem-cover">
                <img src="{{ $experiencia->fotoCapaUrl}}">
            </div>
            <a class="btn btn-acao" href="/experiencias/editafoto/{{ $experiencia->id }}">Editar foto</a>

            {!! Form::model($experiencia, ['method' => 'PATCH', 'action' => ['ExperienciasController@update', $experiencia->id] ]) !!}

                @include('experiencias.form', ['textBtnSubmit' => 'Atualizar'])

            {!! Form::close() !!}

            {{-- incluindo a modal que edita a foto do owner da experiencia apos o form --}
            @include('experiencias._owner_fotoform_modal')

    </div>
</div>
@endsection
