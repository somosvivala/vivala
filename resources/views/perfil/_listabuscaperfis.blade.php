@extends('conectar')

@section('content')
  <div id="lista-busca-perfis">
    <div class="row">

      <nav class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-sm-12 col-md-12 col-lg-12 fundo-cheio text-center">

          <div class="row margin-b-2">
            <h3 class="font-bold-upper text-center">
              {{ trans('global.lbl_profile_all_search') }}
              <small class="sub-titulo">
                {{ trans('global.lbl_find_all_people_here') }}
              </small>
            </h3>
          </div>

          <div class="row margin-b-3">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <h4>{{ trans('global.lbl_all_results_by') }}
                <span class="font-bold-upper"> {{ $query }}</span>
              </h4>
            </div>
          </div>

          <div class="row margin-b-1">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <?php $dataOrder = 0; ?>
              @foreach ($allPerfils as $perfil)
              <div class="col-sm-4 col-md-4 col-lg-4 margin-t-1 margin-b-1">

                <a href="{{ url("/perfil/{$perfil->getUrl()}") }}" class="list-group-item list-perfil-item autocomplete-buscaperfil{{ ($dataOrder == 0) ? ' list-focus' : '' }}" " data-value="{{ $perfil->user_id }}" data-order="{{ $dataOrder }}">
                  <div class="round foto quadrado7em">
                      <div class="avatar-img" style="background-image:url('{{ $perfil->photo }}')"></div>
                  </div>
                  <p class="ajuste-fonte-avenir-medium text-center margin-t-1">
                    {{ $perfil['nome_completo'] }}
                  </p>
                </a>

              </div>
                <?php $dataOrder++; ?>
              @endforeach
            </div>
          </div>

          <div class="row margin-b-2">
            @if($allPerfils->hasMorePages())
              <a href="{{ $allPerfils->nextPageUrl() }}" class="btn btn-acao">Mais Perfis</a>
            @endif
          </div>
        </div>
      </nav>


    </div>
  </div>

@endsection
