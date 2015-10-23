<div class="cars-home">
    <form novalidate="novalidate" name="carSearch" id="carSearch" class="cars-searchbox-form" action="" method="GET">
        <div id="carCitiesContainer">
            <div id="carOriginContainer" class="city-container">	<!--Car origin city input-->
                <label id="carOriginLabel" for="carOrigin">Cidade de retirada</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="false" id="carOrigin" name="carOrigin" class="city-input required ui-autocomplete-input valid" value="" data-provide="typeahead" placeholder="Onde deseja retirar o veículo" type="text">
                <input id="pickUpPlace" name="pickUpPlace" class="required" value="" type="hidden">
                <input id="pickUpPlaceType" name="pickUpPlaceType" class="required" value="" type="hidden">
            </div>

            <div class="cars-checkbox-container">
                <input id="placesCheckbox" class="cars-checkbox" name="placesCheckbox" type="checkbox">
                <label id="returnCityLabel" for="placesCheckbox">Devolver o carro em outra cidade</label>
            </div>

            <div id="carDestinationContainer" class="city-container" style="display:none">	<!--Car destination city input-->
                <label id="carDestinationLabel" for="carDestination">Cidade de devolução</label><br>
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" id="carDestination" name="carDestination" class="city-input required ui-autocomplete-input" value="" data-provide="typeahead" placeholder="Onde deseja entregar o veículo" type="text">
                <input id="dropOffPlace" name="dropOffPlace" class="required" value="" type="hidden">
                <input id="dropOffPlaceType" name="dropOffPlaceType" class="required" value="" type="hidden">
            </div>
        </div>

        <div id="carDatesContainer">
            <div id="carPickUpDateContainer" class="car-date-container">
                <label id="pickUpDateLabel" for="pickUpDate">Início</label><br>
                <div id="carPickUpDateContainer" class="date-container">	<!--Car pick up date input-->
                    <input id="pickUpDate" name="pickUpDate" placeholder="dd-mm-aaaa" class="input-date required hasDatepicker" type="text">

                    <span class="mainSprite calendar"></span>
                </div>
                <select id="pickUpTime" name="pickUpTime" class="required time-selector">
                    <option value="00:00">{{ trans('global.time_00_00_text') }}</option>
                    <option value="01:00">{{ trans('global.time_01_00') }}</option>
                    <option value="02:00">{{ trans('global.time_02_00') }}</option>
                    <option value="03:00">{{ trans('global.time_03_00') }}</option>
                    <option value="04:00">{{ trans('global.time_04_00') }}</option>
                    <option value="05:00">{{ trans('global.time_05_00') }}</option>
                    <option value="06:00">{{ trans('global.time_06_00') }}</option>
                    <option value="07:00">{{ trans('global.time_07_00') }}</option>
                    <option value="08:00">{{ trans('global.time_08_00') }}</option>
                    <option value="09:00">{{ trans('global.time_09_00') }}</option>
                    <option value="10:00">{{ trans('global.time_10_00') }}</option>
                    <option value="11:00" selected="selected">{{ trans('global.time_11_00') }}</option>
                    <option value="12:00">{{ trans('global.time_12_00_text') }}</option>
                    <option value="13:00">{{ trans('global.time_13_00') }}</option>
                    <option value="14:00">{{ trans('global.time_14_00') }}</option>
                    <option value="15:00">{{ trans('global.time_15_00') }}</option>
                    <option value="16:00">{{ trans('global.time_16_00') }}</option>
                    <option value="17:00">{{ trans('global.time_17_00') }}</option>
                    <option value="18:00">{{ trans('global.time_18_00') }}</option>
                    <option value="19:00">{{ trans('global.time_19_00') }}</option>
                    <option value="20:00">{{ trans('global.time_20_00') }}</option>
                    <option value="21:00">{{ trans('global.time_21_00') }}</option>
                    <option value="22:00">{{ trans('global.time_22_00') }}</option>
                    <option value="23:00">{{ trans('global.time_23_00') }}</option>
                </select>
            </div>
            <div id="carDropOffDateContainer" class="car-date-container">
                <label id="dropOffDateLabel" for="dropOffDate">Término</label><br>
                <div id="carDropOffDateContainer" class="date-container">	<!--Car drop off date input-->
                    <input id="dropOffDate" name="dropOffDate" placeholder="dd-mm-aaaa" class="input-date required hasDatepicker" type="text">

                    <span class="mainSprite calendar"></span>
                </div>
                <select id="dropOffTime" name="dropOffTime" class="required time-selector">
                    <option value="00:00">{{ trans('global.time_00_00_text') }}</option>
                    <option value="01:00">{{ trans('global.time_01_00') }}</option>
                    <option value="02:00">{{ trans('global.time_02_00') }}</option>
                    <option value="03:00">{{ trans('global.time_03_00') }}</option>
                    <option value="04:00">{{ trans('global.time_04_00') }}</option>
                    <option value="05:00">{{ trans('global.time_05_00') }}</option>
                    <option value="06:00">{{ trans('global.time_06_00') }}</option>
                    <option value="07:00">{{ trans('global.time_07_00') }}</option>
                    <option value="08:00">{{ trans('global.time_08_00') }}</option>
                    <option value="09:00">{{ trans('global.time_09_00') }}</option>
                    <option value="10:00">{{ trans('global.time_10_00') }}</option>
                    <option value="11:00" selected="selected">{{ trans('global.time_11_00') }}</option>
                    <option value="12:00">{{ trans('global.time_12_00_text') }}</option>
                    <option value="13:00">{{ trans('global.time_13_00') }}</option>
                    <option value="14:00">{{ trans('global.time_14_00') }}</option>
                    <option value="15:00">{{ trans('global.time_15_00') }}</option>
                    <option value="16:00">{{ trans('global.time_16_00') }}</option>
                    <option value="17:00">{{ trans('global.time_17_00') }}</option>
                    <option value="18:00">{{ trans('global.time_18_00') }}</option>
                    <option value="19:00">{{ trans('global.time_19_00') }}</option>
                    <option value="20:00">{{ trans('global.time_20_00') }}</option>
                    <option value="21:00">{{ trans('global.time_21_00') }}</option>
                    <option value="22:00">{{ trans('global.time_22_00') }}</option>
                    <option value="23:00">{{ trans('global.time_23_00') }}</option>
                </select>
            </div>
        </div>
        <br>
    </form>



<input id="carMaxPickUpDateErrorMessage" class="ignore" value="A data de início não está dentro do intervalo permitido." type="hidden">
<input id="carMaxDateRangeErrorMessage" class="ignore" value="O tempo máximo de aluguel não pode ser superior a {0} dias." type="hidden">
<input id="carDropOffDateValidMessage" class="ignore" value="Por favor insira uma data de partida." type="hidden">
<input id="carPickUpDateValidMessage" class="ignore" value="Por favor insira uma data de entrada." type="hidden">
<input id="typeOriginCityMessage" class="ignore" value="Por favor, escreva onde deseja retirar o veículo." type="hidden">
<input id="typeDestinationCityMessage" class="ignore" value="Por favor, escreva onde deseja entregar o veículo." type="hidden">
<input id="insertPickUpDateMessage" class="ignore" value="Por favor, insira uma data de início." type="hidden">
<input id="insertDropOffDateMessage" class="ignore" value="Por favor, insira uma data de término." type="hidden">
<input id="carOriginIdMessage" class="ignore" value="A cidade de retirada não é válida." type="hidden">
<input id="carDestinationIdMessage" class="ignore" value="A cidade de devolução não é válida." type="hidden">
<input id="carRelationBetweenDatesMessage" class="ignore" value="A data de término, deve ser posterior a data de início." type="hidden">
<input id="carMinRentHoursErrorMessage" class="ignore" value="O tempo mínimo de aluguel não pode ser inferior a {0} horas" type="hidden">
<input id="carMinAnticipationTimeErrorMessage" class="ignore" value="A hora de início do aluguel deve estar dentro de um mínimo de {0} horas." type="hidden">
<input id="pickUpPlaceMessage" class="ignore" value="A cidade de retirada não é válida." type="hidden">
<input id="dropOffPlaceMessage" class="ignore" value="A cidade de devolução não é válida." type="hidden">

<div class="row">
    <div class="col-sm-12 text-center margin-b-2 margin-t-2">
        <button class="btn btn-acao">Procurar</button>
    </div>
</div>
<!--div class="mod-searchbutton">
<button class"buttonContainer btn btn-acao"><span onclick="submitCarSearch()">Procurar</span></a>
</div -->
</div>
