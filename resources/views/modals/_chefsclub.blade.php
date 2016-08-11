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
                          <p class="ajuste-fonte-avenir-medium text-justify margin-t-1">
                              {{ $r->descricao }}
                          </p>
                      </div>
                  </div>
              </div>
              <hr class="margin-b-1">
              <div class="row text-center margin-t-2">
                <div class="col-sm-4 col-md-4 col-lg-4 text-left padding-t-2">
                  <p class="ajuste-fonte-avenir-medium">{!! trans('chefsclub.chefsclub_advantages_text-1') !!}</p>
                  <p class="ajuste-fonte-avenir-medium">{!! trans('chefsclub.chefsclub_advantages_text-2') !!}</p>
                  <p class="ajuste-fonte-avenir-medium">{!! trans('chefsclub.chefsclub_advantages_text-3') !!}</p>
                  <p class="ajuste-fonte-avenir-medium">{!! trans('chefsclub.chefsclub_advantages_text-4') !!}</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <a class="btn logger-ativo" data-tipo="chefsclub_tipo_entreclubeinterno" data-desc="chefsclub_desc_entreclubeinterno" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}" target="_blank" href="https://www.chefsclub.com.br/desconto/vivala">
                    <p>{{ trans('chefsclub.chefsclub_join-the-club') }}</p>
                    <p><img src="{{ asset('/img/icones/svg/vivala-icon-alimentacao.svg') }}"</p>
                  </a>
                  <p>
                    <i class="icon-footer icon-vivala-logo vi" alt="{{ trans('global.lbl_vivala') }}"></i>
                    <span class="ajuste-fonte-avenir-light"> {!! trans('chefsclub.chefsclub_in-partnership_with') !!} </span>
                    <img src="{{ asset('/img/parceiros/vivala-icon-parceiros-chefsclub.svg') }}" alt="chefsclub.com.br" title="chefsclub.com.br" height="25px"/>
                  </p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 padding-t-1">
                  <p>
                    <p class="margin-b-0">
                      <span class="font-bold-upper branco-fundo-laranja">{!! trans('chefsclub.chefsclub_price_title') !!}</span>
                    </p>
                    <p class="ajuste-fonte-avenir-light">{!! trans('chefsclub.chefsclub_price_subtitle') !!}</p>
                    <div class="row">
                      <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                        <p>
                          <p class="ajuste-fonte-avenir-black laranja">
                            {!! trans('chefsclub.chefsclub_price_text-1-1') !!}
                          </p>
                          <p class="ajuste-fonte-avenir-black laranja">
                            {!! trans('chefsclub.chefsclub_price_text-1-2') !!}
                          </p>
                        </p>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6 text-left">
                        <p class="font-bold-upper laranja chefsclub-price">
                          {!! trans('chefsclub.chefsclub_price_text-2') !!}
                        </p>
                      </div>
                    </div>
                    <p class="ajuste-fonte-avenir-medium">
                      {!! trans('chefsclub.chefsclub_price_text-3') !!}
                      <span class="font-bold-upper laranja">
                        {!! trans('chefsclub.chefsclub_price_text-3-1') !!}
                      </span>
                    </p>
                    <p class="ajuste-fonte-avenir-medium">
                      {!! trans('chefsclub.chefsclub_price_text-4') !!}
                      <span class="font-bold-upper laranja">
                        {!! trans('chefsclub.chefsclub_price_text-4-1') !!}
                      </span>
                    </p>
                  </p>
                </div>
              </div>
              <hr class="margin-b-1 margin-t-2">
              <div class="row text-center">
                <small>{{ trans('chefsclub.chefsclub_warning-1') }}<br>{{ trans('chefsclub.chefsclub_warning-2') }}</small>
              </div>
          </div>
      </div>
    </div>
</div>
