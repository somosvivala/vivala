<div class="advanced-searchbox">
    <form name="buscaVoos" id="buscaVoos" action="flightSearchOneWay" >
        <div class="hidden">        
            {{-- Checado somente o ida e volta, que foi testado nos envios de request --}}
            <input id="roundTripType" name="tripType" value="1" onclick="idaVuelta()" checked="checked" type="radio">
            <label for="roundTripType" id="lbl-round">Ida e volta</label>

            <input id="oneWayTripType" name="tripType" value="2" onclick="javascript:ida()" type="radio">
            <label for="oneWayTripType" id="lbl-oneway">Só ida</label>

            <input id="multipleDestinationsTripType" name="tripType" value="3" onclick="multiplesDestinos()" type="radio">
            <label for="multipleDestinationsTripType" id="lbl-multiple">Múltiplos destinos </label>

            <input value="1" id="selectedTripType" type="hidden">
        </div> 
        <div class="contenedorCiudades" id="contenedorCiudades">

            <div class="col-sm-6">

                <div class="row">
                    <div class="col-sm-12">
                        <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" id="origen" name="origin" class="city-input required ui-autocomplete-input" data-provide="typeahead" placeholder="Selecione sua origem" value="" type="text">
                        <input id="origenID" style="display:none" name="originId" class="required" value="" type="hidden">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" id="destino" name="destination" class="city-input required ui-autocomplete-input valid" data-provide="typeahead" placeholder="Digite a cidade de destino" value="" type="text">
                        <input id="destinoID" style="display:none" name="destinationId" class="required" value="" type="hidden">
                    </div>
                </div>

                {{-- Esse campo é preenchido por js? --}}
                <input id="flightsMinDays" class="ignore" value="0" type="hidden">

                <div class="row">
                    <div class="col-sm-6">
                        <input placeholder="Quando vai? (dd/mm/aaaa)" class="hasDatepicker" id="dataPartidaVoos" name="fromDate" type="text">
                    </div>

                    <div class="col-sm-6">
                        <input placeholder="Quando volta? (dd/mm/aaaa)  " class="input-date required hasDatepicker" id="dataRetornoVoos" name="toDate" type="text">
                    </div>
                </div>

            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <select class="selectNum valid" id="qtdAdultosVoos" name="adultsSelect">
                            <option value="" selected="selected">Adultos</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select class="mostraCriancasVoos" id="qtdCriancasVoos" name="childrenSelect">
                            <option value="">Crianças</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 children-container">
                <label id="agesAtReturn" style="display: none;">Idade ao finalizar a viagem</label>
                @for ($i = 1; $i < 9; $i++)
                    <select id="crianca-voos-{{ $i }}" name="crianca-voos-{{ $i }}" data-child-id="{{ $i }}" onchange="minorSelected(1,false)" class="required idade-criancas">
                            <option value="">Selecione a idade da criança {{ $i }}</option>
                            <option data-tarifa="Tarifa bebê" value="b">0 a 24 meses (nos braços)</option>
                            <option data-tarifa="Tarifa de crianças" value="j">0 a 24 meses (no assento) </option>
                            <option data-tarifa="Tarifa de crianças" value="j">Até 11 anos </option>
                            <option data-tarifa="Tarifa adulto" value="a">12 anos ou mais</option>
                    </select>
                @endfor
            </div>
        </div>
        
        <input style="display:none" name="children" id="children" value="0" type="hidden">
        <input style="display:none" name="childAdults" id="childAdults" value="0" type="hidden">
        <input style="display:none" name="infants" id="infants" value="0" type="hidden">
        <input style="display:none" name="infantChildren" id="infantChildren" value="0" type="hidden">
        <input style="display:none" name="adults" id="adults" value="1" type="hidden">

        <!-- advancedOptions.ftl -->

        <div style="display: block;" id="advancedOptions" class="col-sm-12 advanced-options hidden">
            <div class="advanced-options-select-container">	
                <label for="escalasSelect">Paradas</label>
                <select class="select-advanced-options" id="escalasSelect" name="stopsAdvanced">
                    <option value="">Sem preferências</option>
                    <option value="NONE">Somente vôo directo</option>
                    <option value="ONE">Até 1 parada</option>
                    <option value="MORE_THAN_ONE">2 paradas ou mais</option>
                </select>	
            </div>


            <div class="advanced-options-select-container">	
                <label for="ticketSelect">Classe de bilhete</label>
                <select class="select-advanced-options" id="ticketSelect" name="ticketClass">
                    <option value="">Sem preferências</option>
                    <option value="ECONOMY">Turistica sem restrições</option>
                    <option value="BUSINESS">Executiva/Business </option>
                    <option value="FIRSTCLASS">Primeira classe</option>
                </select>
            </div>

            <div id="airlineContainer" class="airline-container">	
                <label id="airlineLabel" for="origen">Companhias</label>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="airline" name="airline" class="city-input ui-autocomplete-input" data-provide="typeahead" placeholder="Digite uma companhia aérea" value="" type="text">
                <input id="airlineID" style="display:none" name="airlineId" class="required" value="" type="hidden">
            </div>
        </div> <!-- Fin div opcionesAvanzadas-->			
            
        <div class="row">
            <div class="col-sm-12 text-center">
                <button class="btn">Procurar</button>
            </div>
        </div>
    </form>
</div>
