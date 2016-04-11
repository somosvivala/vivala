@extends('conectar')

@section('content')
  <div id="lista-busca-perfis">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">

        <h3 class="font-bold-upper text-center">
          Busca dos Perfis
          <small class="sub-titulo">
            Encontre a galera por aqui!
          </small>
        </h3>

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <?php $dataOrder = 0; ?>
            {{-- @foreach ($allPerfils as $perfil) --}}
            <div class="col-sm-4 col-md-4 col-lg-4">

              <div class="round foto quadrado3em">
                  <div class="avatar-img" style="background-image:url('{{-- $perfil->photo --}}')"></div>
              </div>
              <span class="ajuste-fonte-avenir-medium text-center">
                {{-- $perfil['nome_completo'] --}}
              </span>
              <a href="{{-- url("/perfil/{$perfil->getUrl()}") --}}" class="list-group-item list-perfil-item autocomplete-buscaperfil{{-- ($dataOrder == 0) ? ' list-focus' : '' --}}" " data-value="{{-- $perfil->user_id --}}" data-order="{{-- $dataOrder --}}">
                Visualizar Perfil
              </a>

            </div>
              <?php $dataOrder++; ?>
            {{-- @endforeach --}}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
