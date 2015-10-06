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
            <div class="form-criar">
                {!! Form::open(array('url' => array('empresa/create')))!!}
                <span> Junte-se as pessoas que apoiam você na Vivalá! </span>
                @if(isset($categoriasEmpresas))
                <select name="categoriaEmpresa" class="suave">
                    <option value="null">Escolha uma categoria</option>
                @forelse($categoriasEmpresas as $Categoria)
                    <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
                @empty
                    <option>Sem categorias</option>
                @endforelse
                </select>
                @endif
                {!! Form::text("nome",  null , ['class' => 'suave', 'placeholder'=>'Nome da Empresa']) !!} 
                <span>Ao clicar em Começar, você concorda com os <a href="{{ url('PaginaController@getTermos') }}">Termos das Páginas da Vivalá</a></span>        
                <div class="col-sm-12 text-center">
                    {!! Form::submit('Começar', ['class' => 'btn']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box-criar">
            <img src="/images/iconcriarong.png" alt="Criar Projeto Social">
            <h4>Projeto Social</h4>
            <div class="form-criar">
                {!! Form::open(array('url' => array('ong/create'), 'method' => 'GET' ))!!}
                <span> Junte-se as pessoas que apoiam você na Vivalá! </span>
                @if(isset($categoriasOngs))
                <select name="categoriaOng" class="suave">
                    <option value="null">Escolha uma categoria</option>
                @forelse($categoriasOngs as $Categoria)
                    <option value="{{ $Categoria->id }}">{{ $Categoria->nome }}</option>
                @empty
                    <option>Sem categorias</option>
                @endforelse
                </select>
                @endif
                {!! Form::text("nome",  null , ['class' => 'suave', 'placeholder'=>'Nome da Ong']) !!} 
                <span>Ao clicar em Começar, você concorda com os <a href="{{ url('PaginaController@getTermos') }}">Termos das Páginas da Vivalá</a></span>        
                <div class="col-sm-12 text-center">
                    {!! Form::submit('Começar', ['class' => 'btn']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box-criar">
            <img src="/images/iconcriarcultura.png" alt="Fomentar Cultura">
            <h4>Cultura</h4>
        </div>
    </div>
</div>

@endsection
