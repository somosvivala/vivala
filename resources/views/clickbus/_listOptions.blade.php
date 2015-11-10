<div class="row">
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
            <span>Passagens de ônibus de {{$result[0]['from']}} para {{$result[0]['to']}}</span>
        </div>
        @foreach ($result as $option)
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-2 borda-esquerda borda-inferior">
                        <div class="col-xs-10 company-logo" style="background-image: url({{$option['part'][0]['busCompany']['logo']}})"></div>
                    </div>
                    <div class="col-xs-8 borda-inferior">
                        <div class="col-xs-12 departure">
                            <div class="col-xs-4">Partida: <b>{{$option['part'][0]['departure']['time']}}</b></div>
                            <div class="col-xs-4">{{$option['part'][0]['departure']['city']}}</div>
                            <div class="col-xs-4">Classe: {{$option['part'][0]['serviceClass']}}</div>
                        </div>                
                        <div class="col-xs-12 arrival">
                            <div class="col-xs-4">Chegada: <b>{{$option['part'][0]['arrival']['time']}}</b></div>
                            <div class="col-xs-4">{{$option['part'][0]['arrival']['city']}}</div>
                            <div class="col-xs-4">Duração: {{$option['part'][0]['duration'][0]}}h{{$option['part'][0]['duration'][1]}}min</div>
                        </div>                
                    </div>
                    <div class="col-xs-2 borda-direita borda-inferior">
                        <div class="col xs-12">R$ {{$option['part'][0]['price']}}</div>
                        <div class="col-xs-12"><a data-id="{{$option['part'][0]['id']}}" href="#" class="btn btn-choose-{{$type}}">Escolher {{$type}}</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>