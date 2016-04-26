<?php $dataOrder = 0; ?>
@foreach ($perfils as $perfil)
  <a href="{{ url("/perfil/{$perfil->getUrl()}") }}" class="list-group-item list-perfil-item autocomplete-buscaperfil{{($dataOrder == 0) ? ' list-focus' : ''}}" " data-value="{{ $perfil->user_id }}" data-order="{{$dataOrder}}">
      <div class="round foto quadrado3em">
          <div class="avatar-img" style="background-image:url('{{ $perfil->photo }}')"></div>
      </div>
      <span class="col-sm-9 col-md-9 col-lg-9 autocomplete-text ajuste-fonte-avenir-medium">{{ $perfil['nome_completo'] }}</span>
  </a>
  <?php $dataOrder++; ?>
@endforeach

<div id="btn-barra-busca-perfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-no padding-r-no">
  <a href="{{ url("/perfil/busca/{$query}") }}" class="btn btn-block btn-acao click-img-no-border">
    {{ trans('global.lbl_seemore') }}
  </a>
</div>
