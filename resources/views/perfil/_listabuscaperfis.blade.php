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
                  <p class="ajuste-fonte-avenir-medium text-left margin-t-1">
                    {{ trans('global.lbl_name') }}: {{ $perfil['nome_completo'] }}
                    <br>
                    {{ trans('global.lbl_nickname') }}:
                    @if($perfil['apelido'] !== NULL)
                      {{ $perfil['apelido'] }}
                    @else
                      {{ trans('global.lbl_n-a') }}
                    @endif
                    <br>
                    {{ trans('global.address_city') }}:
                    @if($perfil['cidade_atual'] !== NULL)
                      {{ $perfil['cidade_atual'] }}
                    @else
                      {{ trans('global.lbl_n-a') }}
                    @endif
                  </p>
                </a>

              </div>
                <?php $dataOrder++; ?>
              @endforeach
            </div>
          </div>

          <div class="row margin-b-2">
            @if($allPerfils->currentPage() !== 1)
            <a href="/perfil/busca/{{$query}}?page={{$allPerfils->currentPage()-1}}" class="btn btn-acao">
              {{ trans('global.lbl_previous') }}
            </a>
            @endif
            @if($allPerfils->hasMorePages())
              <a href="/perfil/busca/{{$query}}?page={{$allPerfils->currentPage()+1}}" class="btn btn-acao">
                {{ trans('global.lbl_next') }}
              </a>
            @endif
          </div>

          <div class="row margin-b-2">
            <?php $numeroDePaginas = (floor($allPerfils->total()/$allPerfils->perPage())+1); ?>
            @for($i=1; $i<=$numeroDePaginas; $i++)
              @if($i === $allPerfils->currentPage())
                <span><a href="/perfil/busca/{{$query}}?page={{$i}}" class="laranja">{{ $i }}</a></span>
              @else
                <span><a href="/perfil/busca/{{$query}}?page={{$i}}">{{ $i }}</a></span>
              @endif
            @endfor
          </div>

        </div>
      </nav>


    </div>
  </div>

@endsection
