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
        {!! Form::open(['id' => 'form-cotar-viagens', 'url' => '/cotarviagem', 'method' => 'POST', 'data-callback' => 'retornoFormCotarViagens', 'data-loading'=>'form-loading', 'data-redirect' => '']) !!}
        <div class="form-group">
            {{-- Botões Iniciais --}}
            <div class="row">
              <h4 class="sub-titulo ajuste-fonte-avenir-medium text-center margin-b-1">
                  {!! trans('global.lbl_what_are_you_looking_for') !!}?
              </h4>
              <div class="col-md-12 col-lg-12 list-group text-center">
                {{-- Botão VÔOS --}}
                <div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2">
                  <div class="text-center">
                    <a href="#" id="ativa-form-voos" class="click-img-no-border">
                      <span class="fa-stack fa-5x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                        <i class="fa fa-plane fa-stack-1x icone-interno"></i>
                      </span>
                    </a>
                    {!! Form::hidden('basico-cotacao-voos', 0, ['id' => 'cotacao-voos']) !!}
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
                  {!! Form::hidden('basico-cotacao-onibus', 0, ['id' => 'cotacao-onibus']) !!}
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
                  {!! Form::hidden('basico-cotacao-hospedagem', 0, ['id' => 'cotacao-hospedagem']) !!}
                </div>
                {{-- Botão CARROS --}}
                <div class="col-md-2 col-lg-2">
                  <a href="#" id="ativa-form-carros" class="click-img-no-border">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo-bloqueado"></i>
                      <i class="fa fa-car fa-stack-1x icone-interno"></i>
                    </span>
                  </a>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_drive') !!}</p>
                  {!! Form::hidden('basico-cotacao-carros', 0, ['id' => 'cotacao-carros']) !!}
                </div>
              </div>
            </div>
            {{-- Form --}}
            <div class="row">
              {{-- Form Básico --}}
              <div id="cotacao-basica" data-value="0" class="hidden">
                <div class="col-md-12 col-lg-12 text-right margin-b-1">
                  <p class="laranja">
                    <i class="fa fa-plus-circle"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.quimera_lodge') !!}?</span>
                  </p>
                </div>
                {{-- Infos de IDA e VOLTA e DATAS --}}
                <div id="viagem-1" class="col-md-12 col-lg-12">
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('basico-origem-1', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                  </div>
                  <div class="col-md-3 col-lg-3">
                    {!! Form::text('basico-destino-1', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <input type="text" id="basico-data-ida-1" name="basico-data-ida-1" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-today-highlight="true" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-start-date="0d" required>
                  </div>
                  <div class="col-md-3 col-lg-3">
                    <input type="text" id="basico-data-volta-1" name="basico-data-volta-1" class="required form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-today-highlight="true" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" data-date-start-date="0d" required>
                  </div>
                  <div class="col-md-1 col-lg-1">
                    {!! Form::checkbox('', 0, false, ['id' => 'mais-hospedagem-1', 'class' => 'form-control']) !!}
                    {!! Form::hidden('basico-mais-hospedagem-1', 0, ['id' => 'basico-mais-hospedagem-1']) !!}
                  </div>
                </div>
                {{-- DESATIVADO TEMPORARIAMENTE
                @for($i=2; $i<=5; $i++)
                  <div id="viagem-{{ $i }}" class="col-md-12 col-lg-12 hidden">
                    <div class="col-md-3 col-lg-3">
                      {!! Form::text('origem-'.$i, null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                      {!! Form::text('destino-'.$i, null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                    </div>
                    <div class="col-md-2 col-lg-2">
                      <input type="text" name="data-ida-{{ $i }}" class="form-control mascara-data" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale') }}">
                    </div>
                    <div class="col-md-3 col-lg-3">
                      <input type="text" name="data-volta-{{ $i }}" class="form-control mascara-data" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale') }}">
                    </div>
                    <div class="col-md-1 col-lg-1">
                      {!! Form::checkbox('mais-hospedagem-'.$i, null, false, ['class' => 'form-control']) !!}
                    </div>
                  </div>
                @endfor
                --}}
                {{-- Adicionar mais destinos - DESATIVADO TEMPORARIAMENTE
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
                      {!! Form::checkbox('', '', false, ['id' => 'data-flexivel']) !!}</span>
                      {!! Form::hidden('basico-datas-flexiveis', 0, ['id' => 'datas-flexiveis']) !!}
                      <span class="ajuste-fonte-avenir-medium">{!! trans('global.lbl_flexible_dates') !!}</span>
                  </div>
                </div>
                {{-- Numero de Adultos e Crianças --}}
                <div class="col-md-12 col-lg-12 margin-t-1">
                  <div class="col-md-6 col-lg-6">
                    <div class="col-md-6 col-lg-6 padding-l-no">
                      {!! Form::label('qtd-adultos', trans('global.lbl_how_many_travellers'), null, ['class' => 'form-control']) !!}<strong>?</strong>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <select id="qtd-adultos" class="form-control" required>
                          @for($i=0; $i<=10; $i++)
                            <option name="qtd-adultos-{{ $i }}" value="{{ $i }}" @if($i === 0) disabled selected @endif>
                              @if($i === 0)
                                {{ trans('global.lbl_select') }}
                              @elseif($i === 1)
                                {{ $i }} {{ trans('global.passenger_adult') }}
                              @elseif($i >= 2)
                                {{ $i }} {{ trans('global.passenger_adult_') }}
                              @endif
                            </option>
                          @endfor
                      </select>
                      {!! Form::hidden('basico-nro-adultos', 0, ['id' => 'nro-adultos']) !!}
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="col-md-6 col-lg-6 padding-l-no">
                      {!! Form::label('qtd-criancas', trans('global.lbl_how_many_child'), null, ['class' => 'form-control']) !!}<strong>?</strong>
                    </div>
                    <div class="col-md-6 col-lg-6">
                      <select id="qtd-criancas" class="form-control" required>
                        @for($i=-1; $i<=10; $i++)
                          <option name="qtd-criancas-{{ $i }}" value="{{ $i }}" @if($i === -1) disabled selected @endif>
                            @if($i === -1)
                              {{ trans('global.lbl_select') }}
                            @elseif($i === 0)
                              {{ trans('global.passenger_child_no') }}
                            @elseif($i === 1)
                              {{ $i }} {{ trans('global.passenger_child') }}
                            @elseif($i >= 2)
                              {{ $i }} {{ trans('global.passenger_child_') }}
                            @endif
                          </option>
                        @endfor
                      </select>
                      {!! Form::hidden('basico-nro-criancas', 0, ['id' => 'nro-criancas']) !!}
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
                          <span title="{!! trans('global.time_morning') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="wi wi-horizon-alt fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('basico-pref-tempo-manha', 0, ['id' => 'pref-tempo-manha']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-tarde" class="click-img-no-border">
                          <span title="{!! trans('global.time_afternoon') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="wi wi-day-sunny fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('basico-pref-tempo-tarde', 0, ['id' => 'pref-tempo-tarde']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-noite" class="click-img-no-border">
                          <span title="{!! trans('global.time_night') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="fa fa-moon-o fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('basico-pref-tempo-noite', 0, ['id' => 'pref-tempo-noite']) !!}
                      </li>
                      <li class="col-md-3 col-lg-3 text-center">
                        <a href="#" id="ativa-tempo-madrugada" class="click-img-no-border">
                          <span title="{!! trans('global.time_dawn') !!}">
                            <span class="fa-stack fa-3x conjunto-icones">
                              <i class="fa fa-circle fa-stack-2x icone-externo-desativado"></i>
                              <i class="wi wi-stars fa-stack-1x icone-interno"></i>
                            </span>
                          </span>
                        </a>
                        {!! Form::hidden('basico-pref-tempo-madrugada', 0, ['id' => 'pref-tempo-madrugada']) !!}
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
                    {!! Form::textarea('basico-horario-restrito', null, ['class' => 'form-control hidden','id' => 'campo-horario-restrito', 'rows' => '5', 'placeholder' => trans('global.lbl_restrict_hours'), 'style' => 'resize:none']) !!}
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
                <div id="cotacao-hotel-quartos" class="row margin-t-1">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-6 col-lg-6">
                      <div class="col-md-5 col-lg-5">
                        {!! Form::label('qtd-quartos-hotel', trans('global.lbl_how_many_rooms'), null, ['class' => 'form-control']) !!}?</strong>
                      </div>
                      <div class="col-md-7 col-lg-7">
                        <select id="qtd-quartos-hotel" class="form-control">
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
                        {!! Form::hidden('hospedagem-nro-quartos', 0, ['id' => 'nro-quartos-hotel']) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hotel-adicionais" class="row margin-t-1">
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
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-cafe']) !!}
                          {!! Form::hidden('hospedagem-adicional-cafe', 0, ['id' => 'hospedagem-adicional-cafe']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_breakfast_included') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-wifi']) !!}
                          {!! Form::hidden('hospedagem-adicional-wifi', 0, ['id' => 'hospedagem-adicional-wifi']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_wifi') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-ar-condicionado']) !!}
                          {!! Form::hidden('hospedagem-adicional-ar-condicionado', 0, ['id' => 'hospedagem-adicional-ar-condicionado']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_air_conditioning') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-tv-cabo']) !!}
                          {!! Form::hidden('hospedagem-adicional-tv-cabo', 0, ['id' => 'hospedagem-adicional-tv-cabo']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_tv_cable') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-cancelamento']) !!}
                          {!! Form::hidden('hospedagem-adicional-cancelamento', 0, ['id' => 'hospedagem-adicional-cancelamento']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_cancellation') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-animal']) !!}
                          {!! Form::hidden('hospedagem-adicional-animal', 0, ['id' => 'hospedagem-adicional-animal']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pet_') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-piscina']) !!}
                          {!! Form::hidden('hospedagem-adicional-piscina', 0, ['id' => 'hospedagem-adicional-piscina']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pool') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-academia']) !!}
                          {!! Form::hidden('hospedagem-adicional-academia', 0, ['id' => 'hospedagem-adicional-academia']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_gym') !!}</span>
                        </p>
                      </div>
                      <div class="col-md-4 col-lg-4">
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-estacionamento']) !!}
                          {!! Form::hidden('hospedagem-adicional-estacionamento', 0, ['id' => 'hospedagem-adicional-estacionamento']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_parking') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-banheiro-privativo']) !!}
                          {!! Form::hidden('hospedagem-adicional-banheiro-privativo', 0, ['id' => 'hospedagem-adicional-banheiro-privativo']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_privative_bathroom') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-varanda']) !!}
                          {!! Form::hidden('hospedagem-adicional-varanda', 0, ['id' => 'hospedagem-adicional-banheiro-varanda']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_balcony') !!}</span>
                        </p>
                        <p>
                          {!! Form::checkbox('', '', false, ['id' => 'adicional-translado']) !!}
                          {!! Form::hidden('hospedagem-adicional-translado', 0, ['id' => 'hospedagem-adicional-cafe']) !!}
                          <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_shuttle') !!}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cotacao-hotel-bairro" class="row margin-t-1">
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
                        {!! Form::textarea('hospedagem-informacoes-adicionais', null, ['id' => 'campo-info-adicional', 'class' => 'form-control hidden', 'rows' => '10', 'placeholder' => trans('global.lbl_like_to_add_more_information'), 'style' => 'resize:none']) !!}
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
                    <i id="form-loading" class="fa fa-spinner fa-pulse fa-2x margin-t-1 laranja" style="display:none;"></i>
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
