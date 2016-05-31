<div id="modal-cotacao-viagem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('lbl_close') !!}">
          <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
        <h3 class="modal-title font-bold-upper text-center">
          {!! trans('global.wannatravel_trip_setup') !!}
        </h3>
      </div>
      <div class="modal-body">
        {!! Form::open(['id' => 'form-cotar-viagens', 'url' => '/cotarviagem', 'method' => 'POST', 'data-callback' => 'retornoFormCotarViagens', 'data-loading'=>'form-cotar-viagens-loading', 'data-redirect' => '']) !!}
        <div class="form-group">
            {{-- Botões Iniciais --}}
            <div class="row margin-b-2">
              <h4 class="sub-titulo ajuste-fonte-avenir-medium text-center margin-b-1">
                  {!! trans('global.lbl_what_are_you_looking_for') !!}?
              </h4>
              <div class="col-md-12 col-lg-12 list-group text-center">
                {{-- Botão VÔOS --}}
                <div class="col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1">
                  <div class="text-center">
                    <a href="#" id="ativa-form-voos" class="click-img-no-border">
                      <span class="fa-stack fa-5x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                        <i class="fa fa-plane fa-stack-1x icone-interno"></i>
                      </span>
                    </a>
                    {!! Form::checkbox('basico-cotacao[]', 'Vôos', false, ['id' => 'cotacao-voos', 'class' => 'hidden']) !!}
                    <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_go') !!}</p>
                  </div>
                </div>
                {{-- Botão ÔNIBUS --}}
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-onibus" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-bus fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_bus') !!}</p>
                  {!! Form::checkbox('basico-cotacao[]', 'Ônibus', false, ['id' => 'cotacao-onibus', 'class' => 'hidden']) !!}
                </div>
                {{-- Botão HOSPEDAGEM --}}
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-hospedagem" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-bed fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.quimera_lodge') !!}</p>
                  {!! Form::checkbox('basico-cotacao[]', 'Hospedagem', false, ['id' => 'cotacao-hospedagem', 'class' => 'hidden']) !!}
                </div>
                {{-- Botão ALIMENTAÇÃO --}}
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-alimentacao" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-cutlery fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_eat') !!}</p>
                  {!! Form::checkbox('basico-cotacao[]', 'Alimentação', false, ['id' => 'cotacao-alimentacao', 'class' => 'hidden']) !!}
                </div>
                {{-- Botão CARROS --}}
                <div id="informe-cotacao-carros" class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-carros" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                      <i class="fa fa-car fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_drive') !!}</p>
                  {!! Form::checkbox('basico-cotacao[]', 'Carros', false, ['id' => 'cotacao-carros', 'class' => 'hidden']) !!}
                </div>
              </div>
            </div>
            {{-- Formulários --}}
            <div class="row">
              {{-- Form Básico --}}
              <div id="cotacao-basica" data-value="0" class="hidden">
                {{-- DESABILITADO TEMPORARIAMENTE
                <div class="col-md-12 col-lg-12 text-right margin-b-1">
                  <p class="laranja">
                    <i class="fa fa-plus-circle"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.quimera_lodge') !!}?</span>
                  </p>
                </div>
                --}}
                {{-- Infos de IDA e VOLTA e DATAS --}}
                <div id="viagem-1" class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('basico-origem-1', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('basico-destino-1', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" id="basico-data-ida-1" name="basico-data-ida-1" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-today-highlight="true" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-start-date="0d" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <input type="text" id="basico-data-volta-1" name="basico-data-volta-1" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-today-highlight="true" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-start-date="0d">
                  </div>
                  {{-- DESABILITADO TEMPORARIAMENTE
                  <div class="col-md-1 col-lg-1">
                      {!! Form::checkbox('basico-mais-hospedagem-1', 0, false, ['id' => 'basico-mais-hospedagem-1']) !!}
                  </div>
                  --}}
                </div>
                {{-- DESABILITADO TEMPORARIAMENTE
                @for($i=2; $i<=5; $i++)
                  <div id="viagem-{{ $i }}" class="col-md-12 col-lg-12">
                    <div class="col-md-3 col-lg-3">
                      {!! Form::text('basico-origem-'.$i, null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                      {!! Form::text('basico-destino-'.$i, null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                    </div>
                    <div class="col-md-2 col-lg-2">
                      <input type="text" id="basico-data-ida-{{ $i }}" name="data-ida-{{ $i }}" class="form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale') }}">
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <input type="text" id="basico-data-ida-{{ $i }}" name="data-volta-{{ $i }}" class="form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale') }}">
                    </div>
                    <div class="col-md-1 col-lg-1">
                        {!! Form::checkbox('mais-hospedagem-$i', 0, false, ['id' => 'mais-hospedagem-$i']) !!}
                        {!! Form::hidden('basico-mais-hospedagem-$i', 0, ['id' => 'basico-mais-hospedagem-$i']) !!}
                    </div>
                  </div>
                @endfor
                --}}
                {{-- Adicionar mais destinos - DESABILITADO TEMPORARIAMENTE
                <div class="col-md-12 col-lg-12 margin-t-1 text-left margin-t-1 margin-b-1">
                  <div class="col-md-12 col-lg-12">
                    <a href="#" id="ativa-mais-destinos" class="click-img-no-border">
                      <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium laranja"> {!! trans('global.lbl_travel_to_add_more') !!}</span>
                    </a>
                  </div>
                </div>
                --}}
                {{-- Datas Flexíveis --}}
                <div class="col-md-12 col-lg-12 margin-t-1 text-left margin-b-1">
                  <div class="col-md-12 col-lg-12">
                      {!! Form::checkbox('basico-datas-flexiveis', 0, false, ['id' => 'datas-flexiveis']) !!}</span>
                      <span class="ajuste-fonte-avenir-medium">{!! trans('global.lbl_flexible_dates') !!}</span>
                  </div>
                </div>
                {{-- Numero de Adultos e Crianças --}}
                <div class="col-md-12 col-lg-12 margin-t-1">
                  <div class="col-md-12 col-lg-12 margin-b-1">
                    <div class="col-md-3 col-lg-3 padding-l-no">
                      {!! Form::label('qtd-adultos', trans('global.lbl_how_many_travellers'), null, ['class' => 'form-control']) !!}<strong>?</strong>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <select name="basico-nro-adultos" id="qtd-adultos" class="form-control" required>
                          @for($i=0; $i<=10; $i++)
                            <option name="qtd-adultos-{{ $i }}"
                              @if($i === 0)
                                disabled selected value="">
                                {{ trans('global.lbl_select') }}
                                </option>
                              @elseif($i === 1)
                                value="{{ $i }}">
                                {{ $i }} {{ trans('global.passenger_adult') }}
                                </option>
                              @elseif($i >= 2)
                                value="{{ $i }}">
                                {{ $i }} {{ trans('global.passenger_adult_') }}
                                </option>
                              @endif
                          @endfor
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-3 col-lg-3 padding-l-no">
                      {!! Form::label('qtd-criancas', trans('global.lbl_how_many_child'), null, ['class' => 'form-control']) !!}<strong>?</strong>
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <select name="basico-nro-criancas" id="qtd-criancas" class="form-control" required>
                        @for($i=-1; $i<=10; $i++)
                          <option name="qtd-criancas-{{ $i }}"
                            @if($i === -1)
                              disabled selected value="">
                              {{ trans('global.lbl_select') }}
                              </option>
                            @elseif($i === 0)
                              value="{{ $i }}">
                              {{ trans('global.passenger_child_no') }}
                              </option>
                            @elseif($i === 1)
                              value="{{ $i }}">
                              {{ $i }} {{ trans('global.passenger_child') }}
                              </option>
                            @elseif($i >= 2)
                              value="{{ $i }}">
                              {{ $i }} {{ trans('global.passenger_child_') }}
                              </option>
                            @endif
                        @endfor
                      </select>
                    </div>
                  </div>
                </div>
                {{-- Períodos para Viajar --}}
                <div class="col-md-12 col-lg-12 margin-t-2">
                  <div class="col-md-12 col-lg-12">
                    <strong>{!! trans('global.lbl_any_preference_period_to_travel') !!}?</strong>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 margin-t-2 margin-b-2">
                  <div class="row">
                    <ul class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-manha" class="click-img-no-border">
                          <span class="fa-stack fa-3x conjunto-icones">
                            <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                            <i class="wi wi-horizon-alt fa-stack-1x icone-interno"></i>
                          </span>
                        </a>
                        <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.time_morning') !!}</p>
                        {!! Form::checkbox('basico-pref-tempo-viagem[]', 'Manhã', false, ['id' => 'pref-tempo-manha', 'class' => 'hidden']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-tarde" class="click-img-no-border">
                          <span class="fa-stack fa-3x conjunto-icones">
                            <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                            <i class="wi wi-day-sunny fa-stack-1x icone-interno"></i>
                          </span>
                        </a>
                        <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.time_afternoon') !!}</p>
                        {!! Form::checkbox('basico-pref-tempo-viagem[]', 'Tarde', false, ['id' => 'pref-tempo-tarde', 'class' => 'hidden']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-noite" class="click-img-no-border">
                          <span class="fa-stack fa-3x conjunto-icones">
                            <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                            <i class="fa fa-moon-o fa-stack-1x icone-interno"></i>
                          </span>
                        </a>
                        <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.time_night') !!}</p>
                        {!! Form::checkbox('basico-pref-tempo-viagem[]', 'Noite', false, ['id' => 'pref-tempo-noite', 'class' => 'hidden']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-madrugada" class="click-img-no-border">
                          <span class="fa-stack fa-3x conjunto-icones">
                            <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                            <i class="wi wi-stars fa-stack-1x icone-interno"></i>
                          </span>
                        </a>
                        <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.time_dawn') !!}</p>
                        {!! Form::checkbox('basico-pref-tempo-viagem[]', 'Madrugada', false, ['id' => 'pref-tempo-madrugada', 'class' => 'hidden']) !!}
                      </li>
                    </ul>
                  </div>
                </div>
                {{-- Horários Restritos --}}
                <div class="col-md-12 col-lg-12 margin-t-1 margin-b-2">
                  <div class="col-md-12 col-lg-12 margin-b-1">
                    <a href="#" id="ativa-horario-restrito" class="click-img-no-border">
                      <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium laranja"> {!! trans('global.lbl_restrict_hours') !!}</span>
                    </a>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    {!! Form::textarea('basico-horario-restrito', null, ['class' => 'form-control','id' => 'campo-horario-restrito', 'rows' => '5', 'placeholder' => trans('global.lbl_explain_better_your_restriction'), 'style' => 'resize:none; display:none;']) !!}
                  </div>
                </div>
                {{-- Quando Pretende Gastar --}}
                <div class="col-md-12 col-lg-12 margin-t-1 margin-b-3">
                  <div class="col-md-4 col-lg-4">
                    <strong>{!! trans('global.lbl_how_much_you_want_to_spend') !!}?</strong>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <input type="range" id="range-slider-quanto-gastar" class="rangeslider" min="1" max="5" step="1"></input>
                    {!! Form::hidden('basico-qto-gastar-viagem', 3, ['id' => 'qto-gastar-viagem']) !!}
                  </div>
                </div>
              </div>
              {{-- Form Hospedagem --}}
              <div id="cotacao-hotel" data-value="0" class="hidden">
                <hr class="divisoria"/>
                <div id="cotacao-hotel-titulo" class="row margin-t-2 margin-b-2">
                  <div class="col-md-12 col-lg-12 text-center">
                    <h5 class="titulo-secao">{!! trans('global.quimera_lodge') !!}</h5>
                  </div>
                </div>
                <div id="cotacao-hotel-quartos" class="row margin-t-2">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-6 col-lg-6">
                      <div class="col-md-5 col-lg-5">
                        {!! Form::label('qtd-quartos-hotel', trans('global.lbl_how_many_rooms'), null, ['class' => 'form-control']) !!}?</strong>
                      </div>
                      <div class="col-md-7 col-lg-7">
                        <select name="hospedagem-nro-quartos" id="qtd-quartos-hotel" class="form-control">
                            @for($i=0; $i<=10; $i++)
                              <option name="qtd-quartos-hotel-{{ $i }}" value="{{ $i }}" @if($i === 0) disabled selected @endif>
                                @if($i === 0)
                                  {{ trans('global.lbl_select') }}
                                @elseif($i === 1)
                                  {{ $i }} {!! trans('global.quimera_travel_room') !!}
                                @elseif($i >= 2)
                                  {{ $i }} {!! trans('global.quimera_travel_room_') !!}
                                @endif
                              </option>
                            @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hotel-adicionais" class="row margin-t-2">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-12 col-lg-12">
                        <strong>
                          {!! trans('global.lbl_extra_hosting') !!}?
                        </strong>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Café da Manhã', false) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_breakfast_included') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'WiFi Grátis', false) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_wifi') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Ar Condicionado', false) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_air_conditioning') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'TV a Cabo', false) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_tv_cable') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Cancelamento Grátis', false) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_cancellation') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Permite Animal', false) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pet_') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Piscina', false, ['id' => 'adicional-piscina']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pool') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Academia', false, ['id' => 'adicional-academia']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_gym') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Estacionamento', false, ['id' => 'adicional-estacionamento']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_parking') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Banheiro Privativo', false, ['id' => 'adicional-banheiro-privativo']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_privative_bathroom') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Varanda', false, ['id' => 'adicional-varanda']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_balcony') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('hospedagem-adicionais', 'Translado', false, ['id' => 'adicional-translado']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_shuttle') !!}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hotel-bairro" class="row margin-t-2">
                  <div clas="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-12 col-lg-12">
                        <div class="col-md-4 col-lg-4">
                          {!! Form::label('hospedagem-bairro-regiao-preferencia', trans('global.lbl_neighborhood_preferred_region'), null, ['class' => 'form-control']) !!} :
                        </div>
                        <div class="col-md-4 col-lg-4">{!! Form::text('hospedagem-bairro-regiao-preferencia', null, ['class' => 'form-control']) !!}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hotel-adicional" class="row margin-t-1">
                  <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-12 col-lg-12">
                        <a href="#" id="ativa-info-adicional" class="click-img-no-border">
                          <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium laranja"> {!! trans('global.lbl_like_to_add_more_information') !!}?</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-12 col-lg-12">
                        {!! Form::textarea('hospedagem-informacoes-adicionais', null, ['id' => 'campo-info-adicional', 'class' => 'form-control', 'rows' => '10', 'placeholder' => trans('global.lbl_additional_info_'), 'style' => 'resize:none; display:none;']) !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Form Alimentação --}}
              <div id="cotacao-restaurantes" data-value="0" class="hidden">
                <hr class="divisoria"/>
                <div id="cotacao-alimentacao-titulo" class="row margin-t-2">
                  <div class="col-md-12 col-lg-12 text-center">
                    <h5 class="titulo-secao">{!! trans('global.wannatravel_trip_eat') !!}</h5>
                  </div>
                </div>
                <div id="cotacao-alimentacao-" class="row">
                  {{-- Café da Manhã/Almoço/Jantar --}}
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-12 col-lg-12">
                        <strong>
                          {!! trans('global.lbl_want_to_search_for_places') !!}:
                        </strong>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="row">
                        <ul class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                          <li class="col-md-4 col-lg-4 text-center">
                            <a href="#" id="ativa-cafe-da-manha" class="click-img-no-border">
                              <span class="fa-stack fa-3x conjunto-icones">
                                <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                                <i class="vi icon-vivala-cafe-da-manha fix-vivala-icon-modal fa-stack-1x icone-interno"></i>
                              </span>
                            </a>
                            <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.lbl_breakfast') !!}</p>
                            {!! Form::checkbox('alimentacao-tipo-refeicao', 'Café da Manhã', false, ['id' => 'pref-cafe-da-manha', 'class' => 'hidden']) !!}
                          </li>
                          <li class="col-md-4 col-lg-4 text-center">
                            <a href="#" id="ativa-almoco" class="click-img-no-border">
                              <span class="fa-stack fa-3x conjunto-icones">
                                <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                                <i class="vi icon-vivala-almoco fa-stack-1x fix-vivala-icon-modal icone-interno"></i>
                              </span>
                            </a>
                            <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.lbl_lunch') !!}</p>
                            {!! Form::checkbox('alimentacao-tipo-refeicao', 'Almoço', false, ['id' => 'pref-almoco', 'class' => 'hidden']) !!}
                          </li>
                          <li class="col-md-4 col-lg-4 text-center">
                            <a href="#" id="ativa-jantar" class="click-img-no-border">
                              <span class="fa-stack fa-3x conjunto-icones">
                                <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                                <i class="vi icon-vivala-jantar fa-stack-1x fix-vivala-icon-modal icone-interno"></i>
                              </span>
                            </a>
                            <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.lbl_dinner') !!}</p>
                            {!! Form::checkbox('alimentacao-tipo-refeicao', 'Jantar', false, ['id' => 'pref-jantar', 'class' => 'hidden']) !!}
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  {{-- Culinárias --}}
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-12 col-lg-12">
                        <strong>
                          {!! trans('global.lbl_what_cuisines_combine_more_with') !!}?
                        </strong>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Americana', false, ['id' => 'cozinha-americana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_america') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Asiática', false, ['id' => 'cozinha-asiatica']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_asia') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Australiana', false, ['id' => 'cozinha-australiana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_australia') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Brasileira', false, ['id' => 'cozinha-brasileira']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_brazil') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Caribenha', false, ['id' => 'cozinha-caribenha']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_caribe') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Chinesa', false, ['id' => 'cozinha-chinesa']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_china') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Francesa', false, ['id' => 'cozinha-francesa']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_french') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Indiana', false, ['id' => 'cozinha-indiana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_india') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Italiana', false, ['id' => 'cozinha-italiana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_italy') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Japonesa', false, ['id' => 'cozinha-japonesa']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_japan') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Mediterrânea', false, ['id' => 'cozinha-mediterranea']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_mediterran') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Mexicana', false, ['id' => 'cozinha-mexicana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_mexico') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Peruana', false, ['id' => 'cozinha-peruana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_peru') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Churrascaria', false, ['id' => 'cozinha-churrascaria']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_barbecue') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Contemporânea', false, ['id' => 'cozinha-contemporanea']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_contemporary') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Fast-Food', false, ['id' => 'cozinha-fastfood']) !!}
                          <span class="ajuste-fonte-avenir-medium"> <i>{!! trans('global.lbl_kitchen_fast_food') !!}</i></span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Frutos do Mar', false, ['id' => 'cozinha-frutos-do-mar']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_seafood') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Hamburgueria', false, ['id' => 'cozinha-hamburgueria']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_hamburguer') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Pizzaria', false, ['id' => 'cozinha-pizzaria']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_pizza') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Vegetariana', false, ['id' => 'cozinha-vegetariana']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_vegetarian') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('alimentacao-opcao-cozinha', 'Vegan', false, ['id' => 'cozinha-vegan']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_kitchen_vegan') !!}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  {{-- Momentos --}}
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-12 col-lg-12">
                        <strong>
                          {!! trans('global.lbl_what_are_your_moments_during_trip') !!}?
                        </strong>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('alimentacao-momento', 'Com Família', false, ['id' => 'alimentacao-momento-familia']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_to_go_with_family') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('alimentacao-momento', 'Com Amigos', false, ['id' => 'alimentacao-momento-amigos']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_to_go_with_friends') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('alimentacao-momento', 'Com Namorado(a)', false, ['id' => 'alimentacao-momento-casal']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_to_go_with_romance') !!}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  {{-- Custos --}}
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-12 col-lg-12">
                        <strong>
                          {!! trans('global.lbl_average_price_per_meal') !!}:
                        </strong>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                      <div class="col-md-2 col-md-offset-1 col-lg-2 col-lg-offset-1">
                        <p>
                          {!! Form::checkbox('alimentacao-preco-medio', 'Preço Baixíssimo', false) !!}
                          <span title="R$5,00 - R$15,00">
                            <span class="ajuste-fonte-avenir-medium"> <i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i></span>
                          </span>
                        </p>
                      </div>
                      <div class="col-md-2 col-lg-2">
                        <p>
                          {!! Form::checkbox('alimentacao-preco-medio', 'Preço Baixo', false) !!}
                          <span title="R$15,00 - R$25,00">
                            <span class="ajuste-fonte-avenir-medium"> <i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i></span>
                          </span>
                        </p>
                      </div>
                      <div class="col-md-2 col-lg-2">
                        <p>
                          {!! Form::checkbox('alimentacao-preco-medio', 'Preço Médio', false) !!}
                          <span title="R$25,00 - R$70,00">
                            <span class="ajuste-fonte-avenir-medium"> <i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i></span>
                          </span>
                        </p>
                      </div>
                      <div class="col-md-2 col-lg-2">
                        <p>
                          {!! Form::checkbox('alimentacao-preco-medio', 'Preço Alto', false) !!}
                          <span title="R$70,00 - R$300,00">
                            <span class="ajuste-fonte-avenir-medium"> <i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x alimentacao-desativado"></i></span>
                          </span>
                        </p>
                      </div>
                      <div class="col-md-2 col-lg-2">
                        <p>
                          {!! Form::checkbox('alimentacao-preco-medio', 'Preço Altíssimo', false) !!}
                          <span title="R$300,00+">
                            <span class="ajuste-fonte-avenir-medium"> <i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i><i class="fa fa-dollar fa-1x"></i></span>
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Form Aluguel de Carros --}}
              <div id="cotacao-veiculos" data-value="0" class="hidden">
                <hr class="divisoria"/>
                <div id="cotacao-carros-titulo" class="row margin-t-2">
                  <div class="col-md-12 col-lg-12 text-center">
                    <h5 class="titulo-secao">{!! trans('global.wannatravel_trip_drive') !!}</h5>
                  </div>
                </div>
              </div>
              {{-- Botão de Enviar --}}
              <div id="cotacao-enviar" data-value="0" class="hidden">
                <div class="row margin-t-4">
                  <div class="col-md-12 col-lg-12 text-center">
                    {{-- Loading --}}
                    <div id="form-cotar-viagens-loading" style="display:none;">
                      <i class="fa fa-spinner fa-pulse fa-2x laranja"></i>
                    </div>
                    {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao']) !!}
                  </div>
                </div>
              </div>
            </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
