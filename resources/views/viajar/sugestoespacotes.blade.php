<ul id="menu-direita" class="sugestoes sugestoes-pacotes">
  <div class="margin-b-2">
    <h4 class="suave">
      {{ trans('global.wannatravel_package_find_best_destinies') }}
    </h4>
  </div>
  <ul class="sugestoes sugestoes-pacotes">
      <li class="">
          <a href="#" class="logger-ativo click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/home/flights"  data-tipo="barralateral_tipo_voos" data-desc="barralateral_desc_voos" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
              <div class="round-foto-sem-cover">
                  <img src="{{ asset('/img/dummyvoos.jpg') }}">
              </div>
              <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_1_title') }}</strong>
              <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_1') }}</span>
              <button class="btn btn-acao" type="button" >{{ trans('global.lbl_seemore') }}</button>
          </a>
      </li>
      <li class="">
          <a href="#" class="logger-ativo click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/home/hotels"  data-tipo="barralateral_tipo_hospedagem" data-desc="barralateral_desc_hospedagem" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
              <div class="round-foto-sem-cover">
                  <img src="{{ asset('/img/dummyhoteis.jpg') }}">
              </div>
              <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_2_title') }}</strong>
              <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_2') }}</span>
              <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
          </a>
      </li>
      <li class="">
          <a href="#" class="logger-ativo click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/home/packages" data-tipo="barralateral_tipo_pacotes" data-desc="barralateral_desc_pacotes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
              <div class="round-foto-sem-cover">
                  <img src="{{ asset('/img/dummypackages.jpg') }}">
              </div>
              <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_3_title') }}</strong>
              <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_3') }}</span>
              <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
          </a>
      </li>
      <li class="">
          <a href="/viajar" class="logger-ativo click-img-no-border" data-tipo="barralateral_tipo_restaurantes" data-desc="barralateral_desc_restaurantes" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
              <div class="round-foto-sem-cover">
                  <img src="{{ asset('/img/dummyrestaurantes.jpg') }}">
              </div>
              <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_4_title') }}</strong>
              <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_4') }}</span>
              <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
          </a>
      </li>
      <li class="">
          <a href="/viajar" class="logger-ativo click-img-no-border" data-tipo="barralateral_tipo_onibus" data-desc="barralateral_desc_onibus" data-loggerurl="{{ $_SERVER['REQUEST_URI'] }}">
              <div class="round-foto-sem-cover">
                  <img src="{{ asset('/img/dummyonibus.jpg') }}">
              </div>
              <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_5_title') }}</strong>
              <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_5') }}</span>
              <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
          </a>
      </li>
  </ul>
</ul>
