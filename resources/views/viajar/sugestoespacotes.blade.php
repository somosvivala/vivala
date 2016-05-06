<ul id="menu-direita" class="sugestoes sugestoes-pacotes">
  <div class="margin-b-2">
    <h4 class="suave">
      {{ trans('global.wannatravel_know_our_services') }}
    </h4>
  </div>
  <ul class="sugestoes sugestoes-pacotes">
      <li>
        <div class="round-foto-sem-cover">
            <img src="{{ asset('/img/dummyvoos.jpg') }}">
        </div>
        <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_1_title') }}</strong>
        <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_1') }}</span>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/home/flights">
          <button class="btn btn-acao" type="button" >{{ trans('global.lbl_seemore') }}</button>
        </a>
      </li>
      <li>
        <div class="round-foto-sem-cover">
            <img src="{{ asset('/img/dummyhoteis.jpg') }}">
        </div>
        <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_2_title') }}</strong>
        <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_2') }}</span>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/home/hotels">
          <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
        </a>
      </li>
      <li>
        <div class="round-foto-sem-cover">
            <img src="{{ asset('/img/dummypackages.jpg') }}">
        </div>
        <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_3_title') }}</strong>
        <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_3') }}</span>
        <a href="#" class="click-img-no-border ativa-modal-quimera" data-url="https://www.e-agencias.com.br/vivala/home/packages">
          <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
        </a>
      </li>
      <li>
        <div class="round-foto-sem-cover">
            <img src="{{ asset('/img/dummyrestaurantes.jpg') }}">
        </div>
        <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_4_title') }}</strong>
        <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_4') }}</span>
        <a href="{{ url('/') . '/viajar#restaurantes' }}" class="click-img-no-border">
          <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
        </a>
      </li>
      <li>
        <div class="round-foto-sem-cover">
            <img src="{{ asset('/img/dummyonibus.jpg') }}">
        </div>
        <strong class="col-sm-12 margin-t-1">{{ trans('global.dummy_travel_5_title') }}</strong>
        <span class="col-sm-12 padding-b-1 text-center">{{ trans('global.dummy_travel_5') }}</span>
        <a href="{{ url('/') . '/viajar#rodoviario' }}" class="click-img-no-border">
          <button class="btn btn-acao" type="button">{{ trans('global.lbl_seemore') }}</button>
        </a>
      </li>
  </ul>
</ul>
