<div class="row">
  {{-- Secao com o input do CPF do usuario --}}
  <div class="col-xs-12 col-lg-12 margin-b-1">
    {!! Form::label('cpf', 'CPF', ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text('cpf', null, ['id' => 'cpf', 'class'=>'form-control mascara-cpf', 'required'=>true, 'placeholder'=>'Ex: 123.456.789-88']) !!}
  </div>

  {{-- Secao para insercao do cep do inscrito --}}
  <div class="col-xs-12 col-lg-12 margin-b-1">
    {!! Form::label('endereco_cep', trans('global.address_zipcode'), ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text('endereco_cep', null, ['id'=>'endereco_cep', 'class'=>'form-control mascara-cep busca-cep-ativo', 'required'=>true, 'placeholder'=>'Ex: 123456-789']) !!}
    <i class="fa fa-spin fa-spinner loading-search soft-hide laranja margin-t-2"></i>
  </div>

  {{-- Secao para insercao do localidade do inscrito --}}
  <div class="col-xs-9 col-lg-9 margin-b-1">
    {!! Form::label('endereco_localidade', trans('global.address_city'), ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text('endereco_localidade', null, ['id'=>'endereco_localidade', 'class'=>'form-control', 'required'=>true, 'disabled'=>true]) !!}
  </div>

  {{-- Secao para insercao do uf do inscrito --}}
  <div class="col-xs-3 col-lg-3 margin-b-1">
    {!! Form::label('endereco_uf', trans('global.address_state'), ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text('endereco_uf', null, ['id'=>'endereco_uf', 'class'=>'form-control', 'required' => true, 'disabled'=>true]) !!}
  </div>

  {{-- Secao para insercao do logradouro do inscrito --}}
  <div class="col-xs-12 col-lg-12 margin-b-1">
    {!! Form::label('endereco_logradouro', trans('global.address_patio'), ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text('endereco_logradouro', null, ['id'=>'endereco_logradouro', 'class'=>'form-control', 'required' => true, 'disabled'=>true]) !!}
  </div>

  {{-- Secao para insercao do bairro do inscrito --}}
  <div class="col-xs-12 col-lg-12 margin-b-1">
    {!! Form::label('endereco_bairro', trans('global.address_district'), ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text('endereco_bairro', null, ['id'=>'endereco_bairro', 'class'=>'form-control', 'required' => true, 'disabled'=>true]) !!}
  </div>

  {{-- Secao para insercao do complemento do inscrito --}}
  <div class="col-xs-12 col-lg-12 margin-b-1 hidden">
      {!! Form::label('endereco_complemento', trans('global.address_additional'), ['class'=>'row col-xs-12 col-lg-12']) !!}
    {!! Form::text("endereco_complemento", null, ['id'=>'endereco_complemento', 'class' => 'form-control', 'disabled' => true]) !!}
  </div>
</div>
