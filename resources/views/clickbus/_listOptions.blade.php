<div class="col-xs-12">
    <ul class="nav nav-tabs">
        <li role="presentation"><a class="search-by-date" data-type="{{$type}}" data-date="{{$dates['yesterday'][2]}}" href="#">
                <span class="font-bold-upper">{{$dates['yesterday'][0]}}</span>
                <span class="sub-titulo">{{$dates['yesterday'][1]}}</span>
        </a></li>
        <li role="presentation" class="active"><a href="#">
                <span class="font-bold-upper">{{$dates['today'][0]}}</span>
                <span class="sub-titulo">{{$dates['today'][1]}}</span>
        </a></li>
        <li role="presentation"><a class="search-by-date" data-type="{{$type}}" data-date="{{$dates['tomorrow'][2]}}" href="#">
                <span class="font-bold-upper">{{$dates['tomorrow'][0]}}</span>
                <span class="sub-titulo">{{$dates['tomorrow'][1]}}</span>
        </a></li>
    </ul>
    <div class="col-xs-12" id="descricao-origem-destino">
        @if($result)
        <span>{{ trans('clickbus.clickbus_bus-ticket-to-from') }} {{$result[0]['from']}} {{ trans('clickbus.clickbus_to') }} {{$result[0]['to']}}</span>
        @else
        <span>Nenhuma passagem foi encontrada, tente uma linha diferente ou outra data.</span>
        @endif
    </div>
    <div class="passagens-clickbus">
        @foreach ($result as $option)
        <div class="col-sm-12">
            <div class="row passagem">
                <div class="company-logo">
                    <div class="company-logo-img" style="background-image: url({{$option['part'][0]['busCompany']['logo']}})">
                    </div>
                </div>
                <div class="detalhes">
                    <div class="col-xs-12">
                        <div class="row departure">
                            <div class="row">
                                <div class="col-xs-3">{{ trans('clickbus.clickbus_departure') }}:<b>{{$option['part'][0]['departure']['time']}}</b></div>
                                <div class="col-xs-5">{{$option['part'][0]['departure']['city']}}</div>
                                <div class="col-xs-4">{{ trans('clickbus.clickbus_busclass') }}:<b>{{$option['part'][0]['serviceClass']}}</b></div>
                            </div>
                        </div>
                        <div class="row arrival">
                            <div class="row">
                                <div class="col-xs-3">{{ trans('clickbus.clickbus_arrival') }}:<b>{{$option['part'][0]['arrival']['time']}}</b></div>
                                <div class="col-xs-5">{{$option['part'][0]['arrival']['city']}}</div>
                                <div class="col-xs-4">{{ trans('clickbus.clickbus_tripduration') }}:<b>{{$option['part'][0]['duration'][0]}}h{{$option['part'][0]['duration'][1]}}min</b></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="valor-compra padding-b-1">
                    <div class="row">
                        <h3 class="padding-t-0 padding-b-0 text-center font-bold-upper">R$ {{$option['part'][0]['price']}}</h3>
                        <div class="col-xs-12 text-center"><a data-horario="{{ $option['part'][0]['departure']['time']}}" data-id="{{$option['part'][0]['id']}}" data-horario-chegada="{{$option['part'][0]['arrival']['time']}}" data-classe="{{$option['part'][0]['serviceClass']}}" data-to="{{$option['part'][0]['departure']['city']}}" data-from="{{$option['part'][0]['arrival']['city']}}" href="#" class="btn btn-acao btn-choose-{{$type}} padding-t-0 padding-b-0">Escolher {{$type}}</a></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
