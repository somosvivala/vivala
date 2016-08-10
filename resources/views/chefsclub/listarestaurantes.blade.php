@if ($restaurantes_total == 0)
  <div class="margin-t-2 row detalhes-lista">
    <div class="col-sm-12">
      <h4 class="font-bold-upper">{{ trans('chefsclub.chefsclub_kitchen-no-found') }}</h4>
    </div>
  </div>
@endif

<div data-page="{{ $page }}" class="margin-t-2 row detalhes-lista">

    <div class="row margin-t-1 margin-b-1">
        <div class="col-sm-2 text-left">
          <button type="button" class="btn prev-restaurantes" {{ $page > 1 ? "": "disabled" }}>
            <i class="fa fa-arrow-left"></i>
          </button>
        </div>
        <div class="col-sm-8 text-center">
            <h4 class="font-bold-upper col-sm-12 col-md-12 col-lg-12">
              {{-- TODO: CRAWLAR A CHEFSCLUB NOVAMENTE E ATUALIZAR ESTE VALOR
                $restaurantes_total
              --}}
              {{1700}} {{ trans('chefsclub.chefsclub_avaiable-restaurants') }}
            </h4>
        </div>
        <div class="col-xs-2 text-right">
            <button type="button" class="btn next-restaurantes" {{ $page * 10 >= $restaurantes_total ? "disabled" : "" }}>
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="row">
            @foreach($restaurantes as $r)
            <div class="col-sm-6 col-xs-12 margin-t-2">
              <div class="restaurante col-sm-12">
                <div class="row">
                  <div style="background-image:url('{{ $r->imagem }}');" class="foto-restaurante col-sm-4"></div>
                  <div class="col-sm-8">
                    <h5 class="font-bold-upper ">{{ $r->restaurante }}</h5>
                    <span class="desconto ajuste-fonte-avenir-medium">{{ $r->desconto }}</span>
                    <span class="ajuste-fonte-avenir-medium"><i class="fa fa-map-marker"></i> {{ $r->endereco }}</span>
                    <div class="row maisinfos">
                      <div class="col-sm-4"><i class="fa fa-male"></i> 1 - <?php preg_match('/[0-9]/',$r->beneficio,$match); echo $match[0]+1; ?></div>
                      <div class="col-sm-3 text-center"><?php for($i=0;$i<$r->preco;$i++) echo "<i class='fa fa-usd'></i>"; ?></div>
                      <div class="col-sm-5"><ul><?php foreach(explode(' ',$r->tipo_cozinha) as $tipo) echo "<li>$tipo</li>"; ?></ul></div>
                    </div>
                    <div class="row text-center">
                      <button class="btn suave detalhes-restaurante" type="button" data-restaurante-id="{{ $r->id }}" data-toggle="modal" data-target="#{{ $r->id }}">{{ trans('global.lbl_detail_') }}</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @include('modals._chefsclub', array('r' => $r))
          @endforeach
        </div>
    </div>
    <div class="row margin-t-1 margin-b-1">
        <div class="col-xs-6 text-left">
            <button type="button" class="btn prev-restaurantes margin-t-1" {{ $page > 1 ? "": "disabled" }}>
                    <i class="fa fa-arrow-left"></i>
                </button>
        </div>
        <div class="col-xs-6 text-right">
            <button type="button" class="btn next-restaurantes margin-t-1" {{ $page * 10 >= $restaurantes_total ? "disabled" : "" }}>
                    <i class="fa fa-arrow-right"></i>
                </button>
        </div>
    </div>
</div>
