<div id="cotacao-viagem" class="modal fade" role="dialog">
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
        {!! Form::open(['url' => ['viajar/cotarminhaviagem', Auth::user()->perfil->id ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => 'viajar/cotarminhaviagem/obrigado', 'data-loading'=>'form-loading']) !!}
          {{-- Botões Iniciais --}}
          <div class="row">
            <h4 class="sub-titulo ajuste-fonte-avenir-medium text-center margin-b-1">
                {!! trans('global.lbl_what_are_you_looking_for') !!}?
            </h4>
            <div class="col-md-12 col-lg-12 list-group text-center">
              {{-- Botão VÔOS --}}
              <div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2">
                <div class="text-center">
                  <a href="#" id="ativa-form-voos">
                    <span class="fa-stack fa-5x conjunto-icones">
                      <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                      <i class="fa fa-plane fa-stack-1x icone-interno"></i>
                    </span>
                    <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_go') !!}</p>
                  </a>
                  {!! Form::hidden('cotacao-voos', 0) !!}
                </div>
              </div>
              {{-- Botão ÔNIBUS --}}
              <div class="col-md-2 col-lg-2">
                <a href="#" id="ativa-form-onibus">
                  <span class="fa-stack fa-5x conjunto-icones">
                    <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                    <i class="fa fa-bus fa-stack-1x icone-interno"></i>
                  </span>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_bus') !!}</p>
                </a>
                {!! Form::hidden('cotacao-onibus', 0) !!}
              </div>
              {{-- Botão HOSPEDAGEM --}}
              <div class="col-md-2 col-lg-2">
                <a href="#" id="ativa-form-hospedagem">
                  <span class="fa-stack fa-5x conjunto-icones">
                    <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                    <i class="fa fa-bed fa-stack-1x icone-interno"></i>
                  </span>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.quimera_lodge') !!}</p>
                </a>
                {!! Form::hidden('cotacao-hospedagem', 0) !!}
              </div>
              {{-- Botão CARROS --}}
              <div class="col-md-2 col-lg-2">
                <a href="#" id="ativa-form-carros" class="desativado">
                  <span class="fa-stack fa-5x conjunto-icones">
                    <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                    <i class="fa fa-car fa-stack-1x icone-interno"></i>
                  </span>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_drive') !!}</p>
                </a>
                {!! Form::hidden('cotacao-carros', 0) !!}
              </div>
            </div>
          </div>
          {{-- Form Básico --}}
          <div class="row">
            <div id="cotacao-basica">
              <div class="col-md-12 col-lg-12 text-right margin-b-1">
                <p class="laranja">
                  <i class="fa fa-plus-circle"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.quimera_lodge') !!}?</span>
                </p>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                  {!! Form::text('origem', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                </div>
                <div class="col-md-3 col-lg-3">
                  {!! Form::text('destino', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                </div>
                <div class="col-md-2 col-lg-2">
                  <input type="text" class="required form-control mascara-data" name="cotacao-data-partida" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                </div>
                <div class="col-md-3 col-lg-3">
                  <input type="text" class="required form-control mascara-data" name="cotacao-data-retorno" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                </div>
                <div class="col-md-1 col-lg-1">
                  {!! Form::checkbox('mais-hospedagem', 'mais-hospedagem', false, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="col-md-12 col-lg-12 margin-t-1 text-left margin-t-1 margin-b-1">
                <div class="col-md-12 col-lg-12">
                  <p class="laranja">
                    <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_travel_to_add_more') !!}</span>
                  </p>
                </div>
              </div>
              <div class="col-md-12 col-lg-12 margin-t-1 text-left margin-b-1">
                <div class="col-md-12 col-lg-12">
                  <span class="ajuste-fonte-avenir-medium laranja">
                    {!! Form::checkbox('datas-flexiveis', false, false) !!} {!! trans('global.lbl_flexible_dates') !!}
                  </span>
                </div>
              </div>
              <div class="col-md-12 col-lg-12 margin-t-1">
                <div class="col-md-6 col-lg-6">
                  <div class="col-md-6 col-lg-6">
                    <strong>{!! trans('global.lbl_how_many_travellers') !!}?</strong>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <select id="qtd-quartos-hotel" class="form-control">
                        @for($i=0; $i<=10; $i++)
                            <option name="nro-adultos-{{ $i }}" value="{{ $i }}" @if($i === 0) disabled selected @endif>
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
                    {!! Form::hidden('nro-adultos', 0) !!}
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="col-md-6 col-lg-6">
                    <strong>{!! trans('global.lbl_how_many_child') !!}?</strong>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <select id="qtd-quartos-hotel" class="form-control">
                      @for($i=-1; $i<=10; $i++)
                          <option name="" value="{{ $i }}" @if($i === -1) disabled selected @endif>
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
                    {!! Form::hidden('nro-criancas', 0) !!}
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-12 margin-t-2">
                <strong>{!! trans('global.lbl_any_preference_period_to_travel') !!}?</strong>
              </div>
              <div class="col-md-12 col-lg-12 margin-t-2 margin-b-2">
                <div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_morning') !!}">
                      <span class="fa-stack fa-3x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                        <i class="wi wi-horizon-alt fa-stack-1x icone-interno"></i>
                      </span>
                      {!! Form::hidden('pref-tempo-manha', false) !!}
                    </span>
                  </a>
                </div>
                <div class="col-md-2 col-lg-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_afternoon') !!}">
                      <span class="fa-stack fa-3x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                        <i class="wi wi-day-sunny fa-stack-1x icone-interno"></i>
                      </span>
                      {!! Form::hidden('pref-tempo-tarde', false) !!}
                    </span>
                  </a>
                </div>
                <div class="col-md-2 col-lg-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_night') !!}">
                      <span class="fa-stack fa-3x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                        <i class="fa fa-moon-o fa-stack-1x icone-interno"></i>
                      </span>
                      {!! Form::hidden('pref-tempo-noite', false) !!}
                    </span>
                  </a>
                </div>
                <div class="col-md-2 col-lg-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_dawn') !!}">
                      <span class="fa-stack fa-3x conjunto-icones">
                        <i class="fa fa-circle fa-stack-2x icone-externo"></i>
                        <i class="wi wi-stars fa-stack-1x icone-interno"></i>
                      </span>
                      {!! Form::hidden('pref-tempo-madrugada', false) !!}
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-md-12 col-lg-12 margin-t-1 margin-b-2">
                <div class="col-md-12 col-lg-12">
                  <a href="#">
                    <p class="laranja">
                      <i class="fa fa-plus-circle laranja"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_restrict_hours') !!}</span>
                    </p>
                  </a>
                </div>
                <div class="col-md-12 col-lg-12 hidden">
                  {!! Form::textarea('horarios-restritos') !!}
                </div>
              </div>
            </div>
            <div id="cotacao-hospedagem" class="row">
              <hr class="divisoria"/>
              <div id="cotacao-hospedagem-titulo" class="row margin-t-2 margin-b-2">
                <div class="col-md-12 col-lg-12 text-center">
                  <h5 class="titulo-secao">{!! trans('global.quimera_lodge') !!}</h5>
                </div>
              </div>
              <div id="cotacao-hospedagem-quartos" class="row margin-t-1">
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-6 col-lg-6">
                    <div class="col-md-5 col-lg-5">
                      <strong>{!! trans('global.lbl_how_many_rooms') !!}?</strong>
                    </div>
                    <div class="col-md-7 col-lg-7">
                      <select id="qtd-quartos-hotel" class="form-control">
                          @for($i=1; $i<=10; $i++)
                              <option name="" value="{{ $i }}">
                              {{ $i }}
                              @if($i === 1)
                                {!! trans('global.quimera_travel_room') !!}
                              @endif
                              @if($i >= 2)
                                {!! trans('global.quimera_travel_room_') !!}
                              @endif
                              </option>
                          @endfor
                      </select>
                      {!! Form::hidden('nro-quartos-do-hotel', 0) !!}
                    </div>
                  </div>
                </div>
              </div>
              <div id="cotacao-hospedagem-adicionais" class="row margin-t-1">
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
                        {!! Form::checkbox('hospedagem-adicional-cafe', 0) !!}
                        <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_breakfast_included') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-wifi', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_wifi') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-ar-condicionado', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_air_conditioning') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-tv-cabo', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_tv_cable') !!}</span>
                      </p>
                    </div>
                    <div class="col-md-4 col-lg-4">
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-cancelamento', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_cancellation') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-animal', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pet_') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-piscina', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pool') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-academia', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_gym') !!}</span>
                      </p>
                    </div>
                    <div class="col-md-4 col-lg-4">
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-estacionamento', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_parking') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-banheiro-privativo', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_privative_bathroom') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-varanda', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_balcony') !!}</span>
                      </p>
                      <p>
                      {!! Form::checkbox('hospedagem-adicional-translado', 0) !!}
                      <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_shuttle') !!}</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div id="cotacao-hospedagem-bairro" class="row margin-t-1">
                <div clas="col-md-12 col-lg-12">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      <div class="col-md-3 col-lg-3">
                        <strong>{!! trans('global.lbl_neighborhood_preferred_region') !!}:</strong>
                      </div>
                      <div class="col-md-6 col-lg-6">{!! Form::text('hospedagem-bairro-regiao-preferencia') !!}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="cotacao-hospedagem-adicional" class="row margin-t-1">
                <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      <strong>{!! trans('global.lbl_like_to_add_more_information') !!}?</strong>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-12 col-lg-12">
                    <div class="col-md-12 col-lg-12">
                      {!! Form::textarea('hospedagem-informacoes-adicionais') !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="cotacao-carros" class="row hidden">
              <hr class="divisoria"/>
              <div id="cotacao-carros-titulo" class="row margin-t-2">
                <div class="col-md-12 col-lg-12 text-center">
                  <h5 class="titulo-secao">{!! trans('global.wannatravel_trip_drive') !!}</h5>
                </div>
              </div>
            </div>
            <div id="cotacao-enviar" class="row margin-t-4">
              <div class="col-md-12 col-lg-12 text-center">
                {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao']) !!}
              </div>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
