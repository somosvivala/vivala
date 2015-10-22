@extends('conectar')

@section('content')
<div class="fundo-cheio col-sm-12">
    <h3 class="font-bold-upper text-center margin-b-2">
        {{ trans('global.lbl_page_create') }}
    </h3>
    <div class ="row margin-b-10">
        <div class="col-sm-4">
            <div class="box-criar">
                <img src="/images/iconcriarempresa.png" alt="{{ trans('global.lbl_company_create') }}" title="{{ trans('global.lbl_company_create') }}">
                <h4>
                    {{ trans('global.lbl_company') }}
                </h4>
                <div class="form-criar">
                    {!! Form::open(array('url' => array('empresa/create')))!!}
                    <span>
                        {{ trans('global.pages_join_people') }}
                    </span>
                    @if(isset($categoriasEmpresas))
                    <select name="categoriaEmpresa" class="suave">
                        <option value="null">
                            {{ trans('global.lbl_category_choose') }}
                        </option>
                    @forelse($categoriasEmpresas as $Categoria)
                        <option value="{{ $Categoria->id }}">
                            {{ trans($Categoria->nome) }}
                        </option>
                    @empty
                        <option>
                            {{ trans('global.lbl_category_no_') }}
                        </option>
                    @endforelse
                    </select>
                    @endif
                    {!! Form::text("nome",  null , ['class' => 'suave', 'placeholder'=> trans('global.lbl_company_name') ]) !!}
                    <span>
                        {{ trans('global.pages_by_clicking') }}
                        <a href="{{ url('/paginas/termosecondicoes') }}">
                            {{ trans('global.pages_terms_and_conditions') }}
                        </a>
                    </span>
                    <div class="col-sm-12 text-center">
                        {!! Form::submit( trans('global.lbl_start') , ['class' => 'btn btn-primario btn-acao']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box-criar">
                <img src="/images/iconcriarong.png" alt="{{ trans('global.lbl_ong_create') }}" title"{{ trans('global.lbl_ong_create') }}">
                <h4>{{ trans('global.lbl_ong') }}</h4>
                <div class="form-criar">
                    {!! Form::open(array('url' => array('ong/create'), 'method' => 'GET' ))!!}
                    <span>{{ trans('global.pages_join_people') }}</span>
                    @if(isset($categoriasOngs))
                    <select name="categoriaOng" class="suave">
                        <option value="null">{{ trans('global.lbl_category_choose') }}</option>
                    @forelse($categoriasOngs as $Categoria)
                        <option value="{{ $Categoria->id }}">{{ trans($Categoria->nome) }}</option>
                    @empty
                        <option>{{ trans('global.lbl_category_no_') }}</option>
                    @endforelse
                    </select>
                    @endif
                    {!! Form::text("nome",  null , ['class' => 'suave', 'placeholder'=>'Nome do Projeto de Impacto']) !!}
                    <span>
                        {{ trans('global.pages_by_clicking') }}
                        <a href="{{ url('/paginas/termosecondicoes') }}">{{ trans('global.pages_terms_and_conditions') }}</a>
                    </span>
                    <div class="col-sm-12 text-center">
                        {!! Form::submit( trans('global.lbl_start') , ['class' => 'btn btn-primario btn-acao']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="box-criar">
                <img src="/images/iconcriarcultura.png" alt="{{ trans('global.lbl_culture_foment') }}" title="{{ trans('global.lbl_culture_foment') }}">
                <h4>{{ trans('global.lbl_culture') }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection
