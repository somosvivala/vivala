<div id="cotacao-viagem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="{!! trans('lbl_close') !!}">
          <span aria-hidden="true"><i class="fa fa-close"></i></span>
        </button>
        <h4 class="modal-title font-bold-upper text-center">
          {!! trans('global.wannatravel_trip_setup') !!}
        </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <small class="sub-titulo ajuste-fonte-avenir-medium margin-b-1 ">
              {!! trans('global.lbl_what_are_you_looking_for') !!}?
          </small>
          <div class="col-md-12 col-lg-12 list-group text-center">
            <div class="col-md-2 col-md-offset-3 col-lg-2 col-lg-offset-3">
              <div class="text-center">
                <a href="#" id="ativa-form-voos">
                  <div class="circulo-icones">
                    <i class="fa fa-8x fa-plane"></i>
                  </div>
                  <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_go') !!}</p>
                </a>
              </div>
            </div>
            <div class="col-md-2 col-lg-2">
              <a href="#" id="ativa-form-onibus">
                <div class="circulo-icones">
                  <i class="fa fa-8x fa-bus"></i>
                </div>
                <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.wannatravel_trip_bus') !!}</p>
              </a>
            </div>
            <div class="col-md-2 col-lg-2">
              <a href="#" id="ativa-form-hospedagem">
                <div class="circulo-icones">
                  <i class="fa fa-8x fa-bed"></i>
                </div>
                <p class="margin-t-1 ajuste-fonte-avenir-medium">{!! trans('global.quimera_lodge') !!}</p>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
            {!! Form::open(['url' => ['viajar/cotarminhaviagem',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => 'viajar/cotarminhaviagem/obrigado', 'data-loading'=>'form-loading']) !!}
            <div id="cotacao-basica">
              <div class="col-md-12 col-lg-12 text-right margin-b-1">
                <p class="laranja">
                  <i class="fa fa-plus-circle"></i><span class="ajuste-fonte-avenir-medium"> {!! trans('global.quimera_lodge') !!}?</span>
                </p>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                  {!! Form::text('cotacao-origem', null, ['required' => 'true', 'class' => 'form-control', 'placeholder' => trans('global.lbl_travel_from') ]) !!}
                </div>
                <div class="col-md-3 col-lg-3">
                  {!! Form::text('cotacao-destino', null, ['class' => 'form-control', 'placeholder' => trans('global.lbl_travel_to') ]) !!}
                </div>
                <div class="col-md-2 col-lg-2">
                  <input type="text" class="required form-control mascara-data" name="cotacao-data-partida" placeholder="{!! trans('global.lbl_travel_departure') !!}" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                </div>
                <div class="col-md-3 col-lg-3">
                  <input type="text" class="required form-control mascara-data" name="cotacao-data-retorno" placeholder="{!! trans('global.lbl_travel_return') !!} ({!! trans('global.lbl_optional') !!})" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}" required>
                </div>
                <div class="col-md-1 col-lg-1">
                  {!! Form::checkbox('cotacao-mais-hospedagem', 'mais-hospedagem', false, ['class' => 'form-control']) !!}
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
                  <span class="ajuste-fonte-avenir-medium laranja">{!! Form::checkbox('cotacao-datas-flexiveis', 'data-flexivel', false, ['class' => '']) !!} {!! trans('global.lbl_flexible_dates') !!}</span>
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
                            <option name="nro-adultos-{{ $i }}" value="{{ $i }}">
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
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="col-md-6 col-lg-6">
                    <strong>{!! trans('global.lbl_how_many_child') !!}?</strong>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <select id="qtd-quartos-hotel" class="form-control">
                      @for($i=0; $i<=10; $i++)
                          <option name="" value="{{ $i }}">
                          @if($i === 0)
                            {{ trans('global.lbl_select') }}
                          @elseif($i === 1)
                            {{ $i }} {{ trans('global.passenger_child') }}
                          @elseif($i >= 2)
                            {{ $i }} {{ trans('global.passenger_child_') }}
                          @endif
                          </option>
                      @endfor
                    </select>
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
                      <div class="tempo-icones">
                        <i class="wi wi-horizon-alt fa-4x"></i>
                      </div>
                      {!! Form::hidden('pref-tempo-manha', 'manha') !!}
                    </span>
                  </a>
                </div>
                <div class="col-md-2 col-lg-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_afternoon') !!}">
                      <div class="tempo-icones">
                        <i class="wi wi-day-sunny fa-4x"></i>
                      </div>
                      {!! Form::hidden('pref-tempo-tarde', 'tarde') !!}
                    </span>
                  </a>
                </div>
                <div class="col-md-2 col-lg-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_night') !!}">
                      <div class="tempo-icones">
                        <i class="fa fa-moon-o fa-4x"></i>
                      </div>
                      {!! Form::hidden('pref-tempo-noite', 'noite') !!}
                    </span>
                  </a>
                </div>
                <div class="col-md-2 col-lg-2 text-center">
                  <a href="#">
                    <span title="{!! trans('global.time_dawn') !!}">
                      <div class="tempo-icones">
                        <i class="wi wi-stars fa-4x"></i>
                      </div>
                      {!! Form::hidden('pref-tempo-madrugada', 'madrugada') !!}
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div id="cotacao-voos" class="row hidden">
              <hr class="divisoria"/>
              <div id="cotacao-hospedagem-titulo" class="row margin-t-2">
                <div class="col-md-12 col-lg-12 text-center cotacao-titulo">
                  {!! trans('global.wannatravel_trip_go') !!}
                </div>
              </div>
            </div>
            <div id="cotacao-onibus" class="row hidden">
              <hr class="divisoria"/>
              <div id="cotacao-hospedagem-titulo" class="row margin-t-2">
                <div class="col-md-12 col-lg-12 text-center cotacao-titulo">
                  {!! trans('global.wannatravel_trip_bus') !!}
                </div>
              </div>
            </div>
            <div id="cotacao-hospedagem" class="row hidden">
              <hr class="divisoria"/>
              <div id="cotacao-hospedagem-titulo" class="row margin-t-2 margin-b-2">
                <div class="col-md-12 col-lg-12 text-center cotacao-titulo">
                  <p class="titulo-secao">{!! trans('global.quimera_lodge') !!}</p>
                </div>
              </div>
              <div id="cotacao-hospedagem-quartos" class="row margin-t-1">
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
                  </div>
                </div>
              </div>
              <div id="cotacao-hospedagem-adicionais" class="row margin-t-1">
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                    <strong>
                      {!! trans('global.lbl_extra_hosting') !!}?
                    </strong>
                  </div>
                  <div class="col-md-4 col-lg-4">
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-cafe', 'adicional-cafe') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_breakfast_included') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-wifi', 'adicional-wifi') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_wifi') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-ar-condicionado', 'adicional-ar-condicionado') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_air_conditioning') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-tv-cabo', 'adicional-tv-cabo') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_tv_cable') !!}</span>
                    </p>
                  </div>
                  <div class="col-md-4 col-lg-4">
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-cancelamento', 'adicional-cancelamento') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_cancellation') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-animal', 'adicional-animal') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pet_') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-piscina', 'adicional-piscina') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_pool') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-academia', 'adicional-academia') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_gym') !!}</span>
                    </p>
                  </div>
                  <div class="col-md-4 col-lg-4">
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-estacionamento', 'adicional-estacionamento') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_free_parking') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-banheiro-privativo', 'adicional-banheiro-privativo') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_privative_bathroom') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('cotacao-hospedagem-adicional-varanda', 'adicional-varanda') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_balcony') !!}</span>
                    </p>
                    <p>
                    {!! Form::checkbox('hotel-adicional-translado', 'value') !!}
                    <span class="ajuste-fonte-avenir-medium"> {!! trans('global.lbl_shuttle') !!}</span>
                    </p>
                  </div>
                </div>
              </div>
              <div id="cotacao-hospedagem-bairro" class="row margin-t-1">
                <div class="col-md-8 col-lg-8">
                  <div class="col-md-7 col-lg-7">
                    <strong>{!! trans('global.lbl_neighborhood_preferred_region') !!}:</strong>
                  </div>
                  <div class="col-md-5 col-lg-5">{!! Form::text('') !!}</div>
                </div>
              </div>
              <div id="cotacao-hospedagem-adicional" class="row margin-t-1">
                <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                  <div class="col-md-12 col-lg-12">
                    <strong>
                      {!! trans('global.lbl_like_to_add_more_information') !!}?
                    </strong>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="col-md-12 col-lg-12">
                    {!! Form::textarea('') !!}
                  </div>
                </div>
              </div>
            </div>
            <div id="cotacao-enviar" class="row margin-t-4">
              <div class="col-md-12 col-lg-12 text-center">
                {!! Form::submit(trans('global.lbl_submit'), ['class' => 'btn btn-primario btn-acao']) !!}
              </div>
            </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
