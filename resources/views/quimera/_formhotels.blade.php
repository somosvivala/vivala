<div class="advanced-searchbox">

    {{-- inputs de erro, pode tirar será? ou vai ser util com o ero que retornar? --}}
    <input id="hotelFromDateValidMessage" class="ignore" value="Por favor insira uma data de entrada válida." type="hidden">
    <input id="hotelToDateValidMessage" class="ignore" value="Por favor insira uma data de partida válida." type="hidden">
    <input id="fromDateMessage" class="ignore" value="Por favor insira uma data de partida" type="hidden">
    <input id="toDateMessage" class="ignore" value="Por favor insira uma data de retorno" type="hidden">
    <input id="originMessage" class="ignore" value="Por favor insira uma origem" type="hidden">
    <input id="destinationMessage" class="ignore" value="Por favor insira um destino" type="hidden">
    <input id="ageMessage" class="ignore" value="Por favor seleccione a idade" type="hidden">
    <input id="origenIDMessage" class="ignore" value="A origem é desconhecida. Por favor seleccione após a digitação." type="hidden">
    <input id="destinoIDMessage" class="ignore" value="A destino é desconhecida. Por favor, selecione depois de escrever." type="hidden">
    <input id="autocompleteMultipleDestinationsOriginID1Message" class="ignore" value="A origem é desconhecida. Por favor seleccione após a digitação." type="hidden">
    <input id="autocompleteMultipleDestinationsDestinationID1Message" class="ignore" value="A destino é desconhecida. Por favor, selecione depois de escrever." type="hidden">

    <form novalidate="novalidate" name="search" id="search" action="flightSearchOneWay" >
        <ul class="trip-type-container" id="contenedorTipoViaje">
            <li>
                <input id="roundTripType" name="tripType" value="1" onclick="idaVuelta()" checked="checked" type="radio">
                <label for="roundTripType" id="lbl-round">Ida e volta</label>
            </li>
            <li>
                <input id="oneWayTripType" name="tripType" value="2" onclick="javascript:ida()" type="radio">
                <label for="oneWayTripType" id="lbl-oneway">Só ida</label>
            </li>
            <li>
                <input id="multipleDestinationsTripType" name="tripType" value="3" onclick="multiplesDestinos()" type="radio">
                <label for="multipleDestinationsTripType" id="lbl-multiple">Múltiplos destinos </label>
            </li>
            <div class="clearBox"></div>
        </ul>
        <div class="clearBox"></div>
        
        <input value="1" id="selectedTripType" type="hidden">
        
        
        <div class="contenedorCiudades" id="contenedorCiudades">
            <!-- autoCompleteFlightCities.ftl -->
            <input id="originMessage" class="ignore" value="Por favor insira uma origem" type="hidden">
            <input id="destinationMessage" class="ignore" value="Por favor insira um destino" type="hidden">
            <input id="origenIDMessage" class="ignore" value="A origem é desconhecida. Por favor seleccione após a digitação." type="hidden">
            <input id="destinoIDMessage" class="ignore" value="A destino é desconhecida. Por favor, selecione depois de escrever." type="hidden">
            <input id="differentOriginDestination" class="ignore" value="El destino debe ser diferente del origen." type="hidden">

            <script type="text/javascript">
                $(function() {	
                    var url = absolutePath + "autocomplete/";
                    //here we configure AutoComplete for SearchBox Origin and Destination Fields
                    autocompleteField("origen", url, "origenID", "fl", "cities,airports",null,false);
                    autocompleteField("destino", url, "destinoID", "fl", "cities,airports",null,true);
                });
            </script>


            <div id="originContainer" class="city-container">	<!--Origin city input-->
                <label id="origenLabel" for="origen">Origem</label>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" id="origen" name="origin" class="city-input required ui-autocomplete-input" data-provide="typeahead" placeholder="Digite a cidade de origem" value="" type="text">
                <input id="origenID" style="display:none" name="originId" class="required" value="" type="hidden">
            </div>
            <div id="destinationContainer" class="city-container">	<!--Destination city input-->
            <label id="destinoLabel" for="destino">Destino</label>
            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" id="destino" name="destination" class="city-input required ui-autocomplete-input valid" data-provide="typeahead" placeholder="Digite a cidade de destino" value="" type="text">
            <input id="destinoID" style="display:none" name="destinationId" class="required" value="" type="hidden">
            </div>
            <div class="clearBox"></div>
        </div>
        
        <span id="errorCitiesFlight" class="errorLabel">
                <span id="errorOriginCityFlight" class="hide">Por favor insira uma origem</span>
                <span id="errorDestinationCityFlight" class="errorDestinationCityFlight hide">Por favor, insira um destino.</span>
        </span>
        
        <div class="flightDates-container" id="contenedorFechas">
            <!-- dateCalendar.ftl -->
            <input id="fromDateMessage" class="ignore" value="Por favor insira uma data de partida" type="hidden">
            <input id="hotelFromDateValidMessage" class="ignore" value="Por favor insira uma data de entrada válida." type="hidden">
            <input id="hotelToDateValidMessage" class="ignore" value="Por favor insira uma data de partida válida." type="hidden">
            <input id="toDateMessage" class="ignore" value="Por favor insira uma data de retorno" type="hidden">
            <input id="relationBetweenDatesMessage" class="ignore" value="A volta deve ser posterior a ida" type="hidden">
            <input id="minDateIDMessage" class="ignore" value="A data de ida não está dentro do intervalo permitido." type="hidden">

            <input id="flightsMinDays" class="ignore" value="0" type="hidden">

            <div class="date-container" id="fromDateInputContainer">	<!--Departure date input-->
                <label id="fromDateLabel" for="fromCalendar">Ida</label><br>
                <input placeholder="dd-mm-aaaa" class="input-date required hasDatepicker" id="fromCalendar" name="fromDate" type="text">

                <span class="mainSprite calendar"></span>
            </div>
            <p class="date-separator">&nbsp;</p>
            <div style="opacity: 1;" class="date-container" id="toDateInputContainer">	<!--Arrival date input-->
                <label id="toDateLabel" for="toCalendar">Volta</label><br>
                <input placeholder="dd-mm-aaaa" class="input-date required hasDatepicker" id="toCalendar" name="toDate" type="text">

                <span class="mainSprite calendar"></span>
            </div>
            <div class="clearBox"></div>
        </div>

        <div style="display: none;" class="multiple-destination-container" id="multipleDestinations">
            <!-- multipleDestinations.ftl -->
            <input id="autocompleteMultipleDestinationsOriginID1Message" class="ignore" value="A origem é desconhecida. Por favor seleccione após a digitação." type="hidden">
            <input id="autocompleteMultipleDestinationsDestinationID1Message" class="ignore" value="A destino é desconhecida. Por favor, selecione depois de escrever." type="hidden">
            <input id="dateRequiredMessage" class="ignore" value="Por favor, insira uma data de partida." type="hidden">
            <input id="originRequiredMessage" class="ignore" value="Por favor, insira um origem." type="hidden">
            <input id="destinationRequiredMessage" class="ignore" value="Por favor, insira um destino." type="hidden">
            <input id="relationBetweenMultipleDatesMessage" class="ignore" value="Esta data deve ser posterior à trecho anterior" type="hidden">

            <script type="text/javascript">
                function configureMultipleDestinationControls() {
                var url =  absolutePath + "autocomplete/";		
                //here we configure AutoComplete multiple destination fields
                autocompleteField("autocompleteMultipleDestinationsOrigin1", url, "autocompleteMultipleDestinationsOriginID1", "fl", "cities,airports",null,false);
                autocompleteField("autocompleteMultipleDestinationsDestination1", url, "autocompleteMultipleDestinationsDestinationID1", "fl", "cities,airports",null,true);
                //here we configure AutoComplete multiple destination fields
                autocompleteField("autocompleteMultipleDestinationsOrigin2", url, "autocompleteMultipleDestinationsOriginID2", "fl", "cities,airports",null,false);
                autocompleteField("autocompleteMultipleDestinationsDestination2", url, "autocompleteMultipleDestinationsDestinationID2", "fl", "cities,airports",null,true);
                //here we configure AutoComplete multiple destination fields
                autocompleteField("autocompleteMultipleDestinationsOrigin3", url, "autocompleteMultipleDestinationsOriginID3", "fl", "cities,airports",null,false);
                autocompleteField("autocompleteMultipleDestinationsDestination3", url, "autocompleteMultipleDestinationsDestinationID3", "fl", "cities,airports",null,true);
                //here we configure AutoComplete multiple destination fields
                autocompleteField("autocompleteMultipleDestinationsOrigin4", url, "autocompleteMultipleDestinationsOriginID4", "fl", "cities,airports",null,false);
                autocompleteField("autocompleteMultipleDestinationsDestination4", url, "autocompleteMultipleDestinationsDestinationID4", "fl", "cities,airports",null,true);
                //here we configure AutoComplete multiple destination fields
                autocompleteField("autocompleteMultipleDestinationsOrigin5", url, "autocompleteMultipleDestinationsOriginID5", "fl", "cities,airports",null,false);
                autocompleteField("autocompleteMultipleDestinationsDestination5", url, "autocompleteMultipleDestinationsDestinationID5", "fl", "cities,airports",null,true);
                //here we configure AutoComplete multiple destination fields
                autocompleteField("autocompleteMultipleDestinationsOrigin6", url, "autocompleteMultipleDestinationsOriginID6", "fl", "cities,airports",null,false);
                autocompleteField("autocompleteMultipleDestinationsDestination6", url, "autocompleteMultipleDestinationsDestinationID6", "fl", "cities,airports",null,true);
                };
            </script>

            <div id="multipleDestinationsContainer">

                <div class="destination-box" id="tramo-1">

                    <h4 class="title-MD">Trecho 1</h4>

                    <div class="city-container">
                            <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsOrigin1">Origem</label><br>
                            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de origem" id="autocompleteMultipleDestinationsOrigin1" name="autocompleteMultipleDestinationsOrigin1" type="text">
                            <input id="autocompleteMultipleDestinationsOriginID1" style="display:none" name="autocompleteMultipleDestinationsOriginID" type="hidden">
                    </div>
                    <div class="city-container">
                            <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsDestination1">Destino</label><br>
                            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de destino" id="autocompleteMultipleDestinationsDestination1" name="autocompleteMultipleDestinationsDestination1" type="text">
                            <input id="autocompleteMultipleDestinationsDestinationID1" style="display:none" name="autocompleteMultipleDestinationsDestinationID" type="hidden">
                    </div>
                    <div class="clearBox"></div>
                    
                    <div class="date-container" id="fromDateInputContainerMultiple1">	<!--Departure date input-->
                            <label for="autocompleteMultipleDestinationsCalendar1">Ida</label><br>
                            <input placeholder="dd-mm-aaaa" class="input-date hasDatepicker" id="autocompleteMultipleDestinationsCalendar1" name="autocompleteMultipleDestinationsCalendar1" type="text">
                                    
                            <span class="mainSprite calendar"></span>
                    </div>

                    <div class="clearBox"></div>
                </div>


    <div class="destination-box" id="tramo-2">

        <h4 class="title-MD">Trecho 2</h4>

        <div class="city-container">
            <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsOrigin2">Origem</label><br>
            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de origem" id="autocompleteMultipleDestinationsOrigin2" name="autocompleteMultipleDestinationsOrigin2" type="text">
            <input id="autocompleteMultipleDestinationsOriginID2" style="display:none" name="autocompleteMultipleDestinationsOriginID" type="hidden">
        </div>
        <div class="city-container">
            <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsDestination2">Destino</label><br>
            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de destino" id="autocompleteMultipleDestinationsDestination2" name="autocompleteMultipleDestinationsDestination2" type="text">
            <input id="autocompleteMultipleDestinationsDestinationID2" style="display:none" name="autocompleteMultipleDestinationsDestinationID" type="hidden">
        </div>
        <div class="clearBox"></div>
        
        <div class="date-container" id="fromDateInputContainerMultiple2">	<!--Departure date input-->
            <label for="autocompleteMultipleDestinationsCalendar2">Ida</label><br>
            <input placeholder="dd-mm-aaaa" class="input-date hasDatepicker" id="autocompleteMultipleDestinationsCalendar2" name="autocompleteMultipleDestinationsCalendar2" type="text">
                    
            <span class="mainSprite calendar"></span>
        </div>

        <div class="clearBox"></div>
    </div>


    <div class="destination-box hide" id="tramo-3">

                <div class="deletesegment">Eliminar trajeto</div>
        <h4 class="title-MD">Trecho 3</h4>

        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsOrigin3">Origem</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de origem" id="autocompleteMultipleDestinationsOrigin3" name="autocompleteMultipleDestinationsOrigin3" type="text">
                <input id="autocompleteMultipleDestinationsOriginID3" style="display:none" name="autocompleteMultipleDestinationsOriginID" type="hidden">
        </div>
        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsDestination3">Destino</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de destino" id="autocompleteMultipleDestinationsDestination3" name="autocompleteMultipleDestinationsDestination3" type="text">
                <input id="autocompleteMultipleDestinationsDestinationID3" style="display:none" name="autocompleteMultipleDestinationsDestinationID" type="hidden">
        </div>
        <div class="clearBox"></div>
        
        <div class="date-container" id="fromDateInputContainerMultiple3">	<!--Departure date input-->
                <label for="autocompleteMultipleDestinationsCalendar3">Ida</label><br>
                <input placeholder="dd-mm-aaaa" class="input-date hasDatepicker" id="autocompleteMultipleDestinationsCalendar3" name="autocompleteMultipleDestinationsCalendar3" type="text">
                        
                <span class="mainSprite calendar"></span>
        </div>

        <div class="clearBox"></div>
    </div>


    <div class="destination-box 
    hide" id="tramo-4">

                <div class="deletesegment">Eliminar trajeto</div>
        <h4 class="title-MD">Trecho 4</h4>

        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsOrigin4">Origem</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de origem" id="autocompleteMultipleDestinationsOrigin4" name="autocompleteMultipleDestinationsOrigin4" type="text">
                <input id="autocompleteMultipleDestinationsOriginID4" style="display:none" name="autocompleteMultipleDestinationsOriginID" type="hidden">
        </div>
        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsDestination4">Destino</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de destino" id="autocompleteMultipleDestinationsDestination4" name="autocompleteMultipleDestinationsDestination4" type="text">
                <input id="autocompleteMultipleDestinationsDestinationID4" style="display:none" name="autocompleteMultipleDestinationsDestinationID" type="hidden">
        </div>
        <div class="clearBox"></div>
        
        <div class="date-container" id="fromDateInputContainerMultiple4">	<!--Departure date input-->
                <label for="autocompleteMultipleDestinationsCalendar4">Ida</label><br>
                <input placeholder="dd-mm-aaaa" class="input-date hasDatepicker" id="autocompleteMultipleDestinationsCalendar4" name="autocompleteMultipleDestinationsCalendar4" type="text">
                        
                <span class="mainSprite calendar"></span>
        </div>

        <div class="clearBox"></div>
    </div>


    <div class="destination-box 
    hide" id="tramo-5">

                <div class="deletesegment">Eliminar trajeto</div>
        <h4 class="title-MD">Trecho 5</h4>

        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsOrigin5">Origem</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de origem" id="autocompleteMultipleDestinationsOrigin5" name="autocompleteMultipleDestinationsOrigin5" type="text">
                <input id="autocompleteMultipleDestinationsOriginID5" style="display:none" name="autocompleteMultipleDestinationsOriginID" type="hidden">
        </div>
        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsDestination5">Destino</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de destino" id="autocompleteMultipleDestinationsDestination5" name="autocompleteMultipleDestinationsDestination5" type="text">
                <input id="autocompleteMultipleDestinationsDestinationID5" style="display:none" name="autocompleteMultipleDestinationsDestinationID" type="hidden">
        </div>
        <div class="clearBox"></div>
        
        <div class="date-container" id="fromDateInputContainerMultiple5">	<!--Departure date input-->
                <label for="autocompleteMultipleDestinationsCalendar5">Ida</label><br>
                <input placeholder="dd-mm-aaaa" class="input-date hasDatepicker" id="autocompleteMultipleDestinationsCalendar5" name="autocompleteMultipleDestinationsCalendar5" type="text">
                        
                <span class="mainSprite calendar"></span>
        </div>

        <div class="clearBox"></div>
    </div>


    <div class="destination-box 
    hide" id="tramo-6">

                <div class="deletesegment">Eliminar trajeto</div>
        <h4 class="title-MD">Trecho 6</h4>

        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsOrigin6">Origem</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de origem" id="autocompleteMultipleDestinationsOrigin6" name="autocompleteMultipleDestinationsOrigin6" type="text">
                <input id="autocompleteMultipleDestinationsOriginID6" style="display:none" name="autocompleteMultipleDestinationsOriginID" type="hidden">
        </div>
        <div class="city-container">
                <label class="control-label adjust-text-left" for="autocompleteMultipleDestinationsDestination6">Destino</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" class="adjust-margin-left5 city-input ui-autocomplete-input" placeholder="Digite a cidade de destino" id="autocompleteMultipleDestinationsDestination6" name="autocompleteMultipleDestinationsDestination6" type="text">
                <input id="autocompleteMultipleDestinationsDestinationID6" style="display:none" name="autocompleteMultipleDestinationsDestinationID" type="hidden">
        </div>
        <div class="clearBox"></div>
        
        <div class="date-container" id="fromDateInputContainerMultiple6">	<!--Departure date input-->
                <label for="autocompleteMultipleDestinationsCalendar6">Ida</label><br>
                <input placeholder="dd-mm-aaaa" class="input-date hasDatepicker" id="autocompleteMultipleDestinationsCalendar6" name="autocompleteMultipleDestinationsCalendar6" type="text">
                        
                <span class="mainSprite calendar"></span>
        </div>

        <div class="clearBox"></div>
    </div>


    <a id="nuevoTramo" onclick="mostrarNuevoTramo()">+ Adicionar outra cidade</a><br><br>

    </div>		   	</div>
        
        <div class="clearBox"></div>
        
        <div id="passengers">
    <!-- passengers.ftl -->
    <input id="ageMessage" class="ignore" value="Por favor seleccione a idade" type="hidden">

    <div class="passengers-container">
    <label id="adultSelectLabel" for="adultsSelect">Adultos</label>
    <select class="selectNum valid" id="adultsSelect" name="adultsSelect">
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
    <div class="passengers-container">
    <label id="childrenSelectLabel" for="childrenSelect">Crianças</label>       
    <select class="selectNum" id="childrenSelect" name="childrenSelect" onchange="mostrarInputsChildren(false)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
    </select>
    </div>

    <div class="children-container">
    <label id="agesAtReturn" style="display: none;">Idade ao finalizar a viagem</label>
    <div id="childrenDiv1" class="children-div">
        <select name="child1" id="child1" onchange="minorSelected(1,false)" class="required">
                <option value="">Selecione a idade da criança 1</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee1"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee1"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee1"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv1">	
                <div id="errorPassengerFlightRoom-1" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    <div id="childrenDiv2" class="children-div">
        <select name="child2" id="child2" onchange="minorSelected(2,false)" class="required">
                <option value="">Selecione a idade da criança 2</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee2"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee2"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee2"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv2">	
                <div id="errorPassengerFlightRoom-2" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    <div id="childrenDiv3" class="children-div">
        <select name="child3" id="child3" onchange="minorSelected(3,false)" class="required">
                <option value="">Selecione a idade da criança 3</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee3"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee3"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee3"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv3">	
                <div id="errorPassengerFlightRoom-3" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    <div id="childrenDiv4" class="children-div">
        <select name="child4" id="child4" onchange="minorSelected(4,false)" class="required">
                <option value="">Selecione a idade da criança 4</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee4"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee4"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee4"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv4">	
                <div id="errorPassengerFlightRoom-4" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    <div id="childrenDiv5" class="children-div">
        <select name="child5" id="child5" onchange="minorSelected(5,false)" class="required">
                <option value="">Selecione a idade da criança 5</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee5"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee5"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee5"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv5">	
                <div id="errorPassengerFlightRoom-5" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    <div id="childrenDiv6" class="children-div">
        <select name="child6" id="child6" onchange="minorSelected(6,false)" class="required">
                <option value="">Selecione a idade da criança 6</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee6"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee6"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee6"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv6">	
                <div id="errorPassengerFlightRoom-6" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    <div id="childrenDiv7" class="children-div">
        <select name="child7" id="child7" onchange="minorSelected(7,false)" class="required">
                <option value="">Selecione a idade da criança 7</option>
                <option value="0">0 a 24 meses (nos braços)</option>
                <option value="1">0 a 24 meses (no assento) </option>
                <option value="2">Até 11 anos </option>
                <option value="3">12 anos ou mais</option>
        </select>
        <div class="children-fee-info" id="infantFee7"><span class="children-arrow"></span>Tarifa bebê</div>
        <div class="children-fee-info" id="childFee7"><span class="children-arrow"></span>Tarifa de crianças</div>
        <div class="children-fee-info" id="adultFee7"><span class="children-arrow"></span>Tarifa adulto</div>
        <div class="errorLabel childrenDiv7">	
                <div id="errorPassengerFlightRoom-7" class="hide">Por favor seleccione a idade</div>		
        </div>
        <div class="clearBox"></div>
    </div>
    </div>

    <div class="clearBox"></div>

    <input style="display:none" name="children" id="children" value="0" type="hidden">
    <input style="display:none" name="childAdults" id="childAdults" value="0" type="hidden">
    <input style="display:none" name="infants" id="infants" value="0" type="hidden">
    <input style="display:none" name="infantChildren" id="infantChildren" value="0" type="hidden">
    <input style="display:none" name="adults" id="adults" value="1" type="hidden">
    <input style="display:none" id="minAdultsQtyMessage" value="Você não pode entrar mais bebês do que os adultos" type="hidden">	        </div>	

    <div class="clearBox"></div>
    <a onclick="showAdvancedOptions()" class="advanced-link-active" id="advancedLink">Opções avançadas</a>	  	
    <script>
    $(document).ready(function () {	
    // falta el servicio de autocompletar aerolineas
    var url = absolutePath + "autocompleteAirline/";
    autocompleteField("airline", url, "airlineID",null, null,null,null);
    });
    </script>
    <!-- advancedOptions.ftl -->

    <div style="display: block;" id="advancedOptions" class="advanced-options">
    <div class="clearBox"></div>

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
    <div class="clearBox"></div>	


    <input value="Você deve digitar os dois valores, ou nenhum" id="dependenceErrorMessage" type="hidden">

    <div id="airlineContainer" class="airline-container">	
        <label id="airlineLabel" for="origen">Companhias</label>
        <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="airline" name="airline" class="city-input ui-autocomplete-input" data-provide="typeahead" placeholder="Digite uma companhia aérea" value="" type="text">
        <input id="airlineID" style="display:none" name="airlineId" class="required" value="" type="hidden">
    </div>

    <div class="clearBox"></div>
    </div> <!-- Fin div opcionesAvanzadas-->			
        <script>
        thisIsAdvancedOptionsView=false;
    </script>		
        
        <div id="error" name="error">	
        </div>
        
        <div class="clearBox"></div>
        <br>
        
        <div class="mod-searchbutton">
                <a class="buttonContainer">
                        <span onclick="submitSearchForm()">Procurar</span>
                </a>
        </div>		
    </form>
    </div>
