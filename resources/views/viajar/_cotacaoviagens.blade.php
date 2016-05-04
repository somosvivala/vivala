@extends('viajar')

@section('content')
<div id="cotacao-viagem">
  <div class="fundo-cheio col-md-12 col-lg-12 text-justified padding-b-2">
      <div class="col-md-12 col-lg-12">
          <h3 class="font-bold-upper text-center margin-t-1 margin-b-2">
              Monte sua viagem!
              <small class="sub-titulo ajuste-fonte-avenir-medium margin-t-1 ">
                  O que você está procurando?
              </small>
          </h3>
      </div>

      <div class="row">
        <div class="col-md-12 col-lg-12 list-group text-center">
          <div class="col-md-2 col-md-offset-3 col-lg-2 col-lg-offset-3">
            <div class="text-center">
              <div class="circulo-icones">
                <i class="fa fa-8x fa-plane"></i>
              </div>
              <p class="margin-t-1">Voos</p>
            </div>
          </div>
          <div class="col-md-2 col-lg-2">
            <div class="circulo-icones">
              <i class="fa fa-8x fa-bus"></i>
            </div>
            <p class="margin-t-1">Ônibus</p>
          </div>
          <div class="col-md-2 col-lg-2">
            <div class="circulo-icones">
              <i class="fa fa-8x fa-bed"></i>
            </div>
            <p class="margin-t-1">Hotéis</p>
          </div>
        </div>
      </div>

      <div class="row">
        	{!! Form::open(['url' => ['viajar/cotarminhaviagem',  Auth::user()->perfil->id,  ], 'class' =>'form-ajax', 'method' => 'POST', 'data-redirect' => 'viajar/cotarminhaviagem/obrigado', 'data-loading'=>'form-loading']) !!}
          <div class="col-md-12 col-lg-12 text-right margin-b-1">
            <a href="#"><i class="fa fa-plus-circle"></i> Hospedagem?</a>
          </div>
          <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
              {!! Form::text('cotacao-origem', null, ['class' => 'form-control', 'placeholder' => 'Origem' ]) !!}
            </div>
            <div class="col-md-3 col-lg-3">
              {!! Form::text('cotacao-destino', null, ['class' => 'form-control', 'placeholder' => 'Destino' ]) !!}
            </div>
            <div class="col-md-2 col-lg-2">
              <input type="text" class="required form-control mascara-data" required="" name="nascimento-pf" placeholder="Ida" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}">
            </div>
            <div class="col-md-3 col-lg-3">
              <input type="text" class="required form-control mascara-data" required="" name="nascimento-pf" placeholder="Volta (Opcional)" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" data-date-language="{{ Config::get('app.locale') == 'pt'?'pt-BR':Config::get('app.locale')  }}">
            </div>
            <div class="col-md-1 col-lg-1">
              {!! Form::checkbox('mais-hospedagem', 'mais-hospedagem') !!}
            </div>
          </div>
          <div class="col-md-12 col-lg-12 margin-t-1 text-left">
            <a href="#"><i class="fa fa-plus-circle"></i> Adicionar mais destinos</a>
          </div>
          <div class="col-md-12 col-lg-12 margin-t-1">
            <span>{!! Form::checkbox('datas-flexivel', 'datas-flexivel', ['class' => 'form-control']) !!} Minhas datas são flexíveis</span>
          </div>
          <div class="col-md-12 col-lg-12 margin-t-1">
            <div class="col-md-6 col-lg-6">
              <div class="col-md-6 col-lg-6">
                <p>Quantos viajantes?</p>
              </div>
              <div class="col-md-6 col-lg-6">
                <select id="qtd-quartos-hotel" class="form-control">
                    @for($i=1; $i<=10; $i++)
                        <option name="" value="{{ $i }}">
                        {{ $i }}
                        @if($i === 1)
                          {{ trans('global.passenger_adult') }}
                        @endif
                        @if($i >= 2)
                          {{ trans('global.passenger_adult_') }}
                        @endif
                        </option>
                    @endfor
                </select>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="col-md-6 col-lg-6">
                <p class="">Alguma criança?</p>
              </div>
              <div class="col-md-6 col-lg-6">
                <select id="qtd-quartos-hotel" class="form-control">
                  @for($i=1; $i<=10; $i++)
                      <option name="" value="{{ $i }}">
                      {{ $i }}
                      @if($i === 1)
                        {{ trans('global.passenger_child') }}
                      @endif
                      @if($i >= 2)
                        {{ trans('global.passenger_child_') }}
                      @endif
                      </option>
                  @endfor
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-12 margin-t-2">
            <p>Algum período de sua preferência para viajar?</p>
          </div>
          <div class="col-md-12 col-lg-12 margin-t-2">
            <div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 text-center">
              <i class="wi wi-horizon-alt"></i>
            </div>
            <div class="col-md-2 col-lg-2 text-center">
              <i class="wi wi-day-sunny"></i>
            </div>
            <div class="col-md-2 col-lg-2 text-center">
              <i class="fa fa-moon-o"></i>
            </div>
            <div class="col-md-2 col-lg-2 text-center">
              <i class="wi wi-stars"></i>
            </div>
          </div>

          </div>

          <div id="cotacao-voos" class="row">
            <div id="cotacao-hospedagem-titulo" class="row margin-t-2">
              <div class="col-md-12 col-lg-12 text-center cotacao-titulo">
                Voos
              </div>
            </div>
          </div>

          <div id="cotacao-onibus" class="row">
            <div id="cotacao-hospedagem-titulo" class="row margin-t-2">
              <div class="col-md-12 col-lg-12 text-center cotacao-titulo">
                Onibus
              </div>
            </div>
          </div>

          <div id="cotacao-hospedagem" class="row">
            <div id="cotacao-hospedagem-titulo" class="row margin-t-2 margin-b-2">
              <div class="col-md-12 col-lg-12 text-center cotacao-titulo">
                Hospedagem
              </div>
            </div>
            <div id="cotacao-hospedagem-quartos" class="row margin-t-1">
              <div class="col-md-12 col-lg-12">
                <div class="col-md-6 col-lg-6">
                  <div class="col-md-6 col-lg-6">
                    <p>Quantos quartos?</p>
                  </div>
                  <div class="col-md-6 col-lg-6">
                    <select id="qtd-quartos-hotel" class="form-control">
                        @for($i=1; $i<=10; $i++)
                            <option name="" value="{{ $i }}">
                            {{ $i }}
                            @if($i === 1)
                              Quarto
                            @endif
                            @if($i >= 2)
                              Quartos
                            @endif
                            </option>
                        @endfor
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div id="cotacao-hospedagem-adicionais" class="row margin-t-1">
              <div class="col-md-12 col-lg-12">
                <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
                  <span class="ajuste-fonte-avenir-medium">
                    Gostaria de algum adicional em sua hospedagem?
                  </span>
                </div>
                <div class="col-md-4 col-lg-4">
                  <p>
                  {!! Form::checkbox('hotel-adicional-cafe', 'value') !!}
                  Café da manhã incluso
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-wifi-gratis', 'value') !!}
                  WiFi gratuito
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-ar-condicionado', 'value') !!}
                  Ar Condicionado
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-televisao-tv-cabo', 'value') !!}
                  Televisão com TV a cabo
                  </p>
                </div>
                <div class="col-md-4 col-lg-4">
                  <p>
                  {!! Form::checkbox('hotel-adicional-cancelamento-gratis', 'value') !!}
                  Cancelamento grátis
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-pet-liberado', 'value') !!}
                  Animais de estimação
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-piscina', 'value') !!}
                  Piscina
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-academia', 'value') !!}
                  Academia
                  </p>
                </div>
                <div class="col-md-4 col-lg-4">
                  <p>
                  {!! Form::checkbox('hotel-adicional-estacionamento-gratis', 'value') !!}
                  Estacionamento gratuito
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-banheiro-privativo', 'value') !!}
                  Banheiro privativo
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-varanda', 'value') !!}
                  Varanda
                  </p>
                  <p>
                  {!! Form::checkbox('hotel-adicional-translado', 'value') !!}
                  Translado
                  </p>
                </div>
              </div>
            </div>
            <div id="cotacao-hospedagem-bairro" class="row margin-t-1">
              <div class="col-md-12 col-lg-12">
                <div class="col-md-6 col-lg-6">
                  <div class="col-md-7 col-lg-7">Bairro ou região de preferência:</div>
                  <div class="col-md-5 col-lg-5">{!! Form::text('') !!}</div>
                </div>
              </div>
            </div>
          </div>

          <div id="cotacao-info-adicional" class="row">
            <div class="col-md-12 col-lg-12 margin-t-1 margin-b-1">
              Gostaria de adicionar mais alguma informação?
            </div>
            <div class="col-md-12 col-lg-12">
              {!! Form::textarea('') !!}
            </div>
          </div>
          {!! Form::close() !!}
      </div>

</div>
@endsection
