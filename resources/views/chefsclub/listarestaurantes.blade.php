@if ($restaurantes_total == 0)
    <div class="margin-t-2 row detalhes-lista">
        <div class="col-sm-12">
            <h4 class="font-bold-upper">{{ trans('chefsclub.chefsclub_kitchen-no-found') }}</h4>
        </div>
    </div>
    <?php return; ?>
@endif

<div data-page="{{ $page }}" class="margin-t-2 row detalhes-lista">
    <div class="col-sm-12">
        <h4 class="font-bold-upper col-sm-9 padding-t-1">
          {{ $restaurantes_total }}
          {{ trans('chefsclub.chefsclub_avaiable-restaurants') }}
          {{ trans('chefsclub.chefsclub_in-partner-with') }}
        </h4>
        <span class="col-sm-2">
          <img src="{{ asset('/img/parceiros/vivala-icon-parceiros-chefsclub.svg') }}" alt="chefsclub.com.br" title="chefsclub.com.br" width="100%" height="75px"/>
        </span>
    </div>
    <div class="row margin-t-1 margin-b-1">
        <div class="col-xs-6 text-left">
            <button type="button" class="btn prev-restaurantes" {{ $page > 1 ? "": "disabled" }}>
                <i class="fa fa-arrow-left"></i>
            </button>
        </div>
        <div class="col-xs-6 text-right">
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
                        <div style="background-image:url('{{ $r->imagem }}');" class="foto-restaurante col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-bold-upper">{{ $r->restaurante }}</h5>
                            <span class="desconto">{{ $r->desconto }}</span>
                            <span class=""><i class="fa fa-map-marker"></i> {{ $r->endereco }}</span>
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
            <!-- Modal com iframe pra fechamento de pedido -->
            <div id="{{ $r->id }}" class="modal fade modal-restaurante" role="dialog">
                <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h5 class="font-bold-upper">{{ $r->restaurante }}</h5>
                                </div>
                                <div class="col-sm-3 text-right">
                                    {{ $r->dia_hora }}
                                    <span class="desconto">{{ $r->desconto }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-1 text-right">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        {{ $r->endereco }}
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1 text-right">
                                            <i class="fa fa-cutlery"></i>
                                        </div>
                                        {{ $r->tipo_cozinha }}
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-4">
                                                <?php for($i=0;$i<$r->preco;$i++) echo "<i class='fa fa-usd'></i> "; ?>
                                            </div>
                                            {{ trans('chefsclub.chefsclub_price-range') }}
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="col-sm-1 text-right">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            {{ $r->telefone }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-1 text-right">
                                                <i class="fa fa-users"> </i>
                                            </div>
                                            {{ $r->beneficio }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="margin-b-1">
                            <div class="row">
                                <div class="col-sm-12 margin-b-1">
                                    <div style="background-image:url('{{ $r->imagem }}');" class="foto-restaurante-detalhe col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                        <b class="font-bold-upper">
                                            {{ trans('global.lbl_know_more') }}
                                        </b>
                                        <p>
                                            {{ $r->descricao }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr class="margin-b-1">
                            <div class="row text-center margin-t-2">
                                <a class="btn" target="_blank" href="https://www.chefsclub.com.br/desconto/vivala">
                                  {{ trans('chefsclub.chefsclub_join-the-club') }}
                                  <p><img src="{{ asset('/img/parceiros/vivala-icon-parceiros-chefsclub.svg') }}" alt="chefsclub.com.br" title="chefsclub.com.br" width="100%" height="40px"/></p>
                                </a>
                            </div>
                            <hr class="margin-b-1 margin-t-2">
                            <div class="row text-center">
                                <small>
                                {{ trans('chefsclub.chefsclub_warning-1') }}<br/>{{ trans('chefsclub.chefsclub_warning-2') }}
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
