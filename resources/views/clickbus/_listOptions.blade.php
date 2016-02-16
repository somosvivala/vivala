<div class="col-xs-12">
    <ul class="nav nav-tabs">
        <li role="presentation"><a class="search-by-date" data-type="{{$type}}" data-date="{{$dates['yesterday'][2]}}"
            @if($places)
                data-to="{{$places['to']}}"
                data-from="{{$places['from']}}"
            @endif
        href="#" tabindex="-1">
                <span class="font-bold-upper">{{$dates['yesterday'][0]}}</span>
                <span class="sub-titulo">{{$dates['yesterday'][1]}}</span>
        </a></li>
        <li role="presentation" class="active"><a href="#" tabindex="-1">
                <span class="font-bold-upper">{{$dates['today'][0]}}</span>
                <span class="sub-titulo">{{$dates['today'][1]}}</span>
        </a></li>
        <li role="presentation"><a class="search-by-date" data-type="{{$type}}" data-date="{{$dates['tomorrow'][2]}}"
            @if($result)
                data-to="{{$places['to']}}"
                data-from="{{$places['from']}}"
            @endif
        href="#" tabindex="-1">
                <span class="font-bold-upper">{{$dates['tomorrow'][0]}}</span>
                <span class="sub-titulo">{{$dates['tomorrow'][1]}}</span>
        </a></li>
    </ul>
    <div class="col-xs-12" id="descricao-origem-destino">
        @if($result)
        <span>{{ trans('clickbus.clickbus_bus-ticket-to-from') }} {{$result[0]['from']}} {{ trans('clickbus.clickbus_to') }} {{$result[0]['to']}}</span>
        @else
        <span>{{ trans('clickbus.clickbus_client-error-1') }}</span>
        @endif
    </div>
    <div class="passagens-clickbus">
        @foreach ($result as $option)
        <div class="col-sm-12">
            <div class="row passagem">
                <div class="col-sm-2 company-logo">
                    <div class="company-logo-img" style="background-image: url({{$option['part'][0]['busCompany']['logo']}})">
                    </div>
                </div>
                <div class="col-sm-7 detalhes">
                    <div class="col-xs-12">
                        <div class="row departure">
                            <div class="row">
                                <div class="col-xs-3"><span class="sem-quebralinha">{{ trans('clickbus.clickbus_departure') }}: </span><span class="sem-quebralinha"><b>{{$option['part'][0]['departure']['time']}}</b></span></div>
                                <div class="col-xs-5"><span>{{$option['part'][0]['departure']['city']}}</span></div>
                                <div class="col-xs-4"><span class="sem-quebralinha">{{ trans('clickbus.clickbus_busclass') }}: </span><span class="sem-quebralinha"><b>{{$option['part'][0]['serviceClass']}}</b></span></div>
                            </div>
                        </div>
                        <div class="row arrival">
                            <div class="row">
                                <div class="col-xs-3"><span class="sem-quebralinha">{{ trans('clickbus.clickbus_arrival') }}: </span><span class="sem-quebralinha"><b>{{$option['part'][0]['arrival']['time']}}</b></span></div>
                                <div class="col-xs-5"><span class="sem-quebralinha">{{$option['part'][0]['arrival']['city']}}</span></div>
                                <div class="col-xs-4"><span class="sem-quebralinha">{{ trans('clickbus.clickbus_tripduration') }}: </span><span class="sem-quebralinha"><b>{{$option['part'][0]['duration'][0]}}h{{$option['part'][0]['duration'][1]}}min</b></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 valor-compra padding-b-1">
                    <div class="row">
                        <h3 class="padding-t-0 padding-b-0 text-center font-bold-upper">R$ {{$option['part'][0]['price']}}</h3>
                        <div class="col-xs-12 text-center"><a data-horario="{{ $option['part'][0]['departure']['time']}}" data-id="{{$option['part'][0]['id']}}" data-horario-chegada="{{$option['part'][0]['arrival']['time']}}" data-classe="{{$option['part'][0]['serviceClass']}}" data-to="{{$places['to']}}" data-from="{{$places['from']}}" href="#" class="btn btn-acao btn-choose-{{$type}} padding-t-0 padding-b-0" tabindex="-1">{{ trans('global.lbl_choose') }} {{$type}}</a></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
