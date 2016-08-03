    {{-- Secao com o input do CPF do usuario --}}
    <div class="col-sm-12  margin-b-1">
      <div class="row">
        {!! Form::label('cpf', 'CPF', ['class' => 'col-lg-9']) !!}
      </div>
        {!! Form::text('cpf', null, ['placeholder' => 'Ex: 123.456.789-88', 'class' => 'form-control mascara-cpf', 'required' => true]) !!}
    </div>

    {{-- Secao para insercao do cep do inscrito --}}
    <div class="col-sm-12  margin-b-1">
      <div class="row">
        {!! Form::label('endereco_cep', 'CEP', ['class' => 'col-lg-9']) !!}
      </div>
      {!! Form::text("endereco_cep", null, ['placeholder' => 'Ex: 123456-789', 'id'=>'endereco_cep', 'class' => 'form-control busca-cep-ativo mascara-cep', 'required' => true]) !!}
      <i class="fa fa-spin fa-spinner loading-search soft-hide laranja margin-t-1 "></i>
    </div>

    {{-- Secao para insercao do localidade do inscrito --}}
    <div class="col-xs-9  margin-b-1">
      <div class="row">
        {!! Form::label('endereco_localidade', 'Localidade', ['class' => 'col-lg-9']) !!}
      </div>
      {!! Form::text("endereco_localidade", null, ['id'=>'endereco_localidade', 'class' => 'form-control', 'disabled' => true, 'required' => true]) !!}
    </div>


    {{-- Secao para insercao do uf do inscrito --}}
    <div class="col-xs-3 margin-b-1">
      <div class="row">
        {!! Form::label('endereco_uf', 'UF', ['class' => 'col-lg-9']) !!}
      </div>
      {!! Form::text("endereco_uf", null, ['id'=>'endereco_uf', 'class' => 'form-control', 'disabled' => true, 'required' => true]) !!}
    </div>


    {{-- Secao para insercao do logradouro do inscrito --}}
    <div class="col-sm-12  margin-b-1">
      <div class="row">
        {!! Form::label('endereco_logradouro', 'Logradouro', ['class' => 'col-lg-9']) !!}
      </div>
      {!! Form::text("endereco_logradouro", null, ['id'=>'endereco_logradouro', 'class' => 'form-control', 'disabled' => true, 'required' => true]) !!}
    </div>

    {{-- Secao para insercao do bairro do inscrito --}}
    <div class="col-sm-12  margin-b-1">
      <div class="row">
        {!! Form::label('endereco_bairro', 'Bairro', ['class' => 'col-lg-9']) !!}
      </div>
      {!! Form::text("endereco_bairro", null, ['id'=>'endereco_bairro', 'class' => 'form-control', 'disabled' => true, 'required' => true]) !!}
    </div>

    {{-- Secao para insercao do complemento do inscrito --}}
    <div class="col-sm-12  margin-b-1">
      <div class="row">
        {!! Form::label('endereco_complemento', 'Complemento', ['class' => 'col-lg-9']) !!}
      </div>
      {!! Form::text("endereco_complemento", null, ['id'=>'endereco_complemento', 'class' => 'form-control', 'disabled' => true]) !!}
    </div>

