<form novalidate="novalidate" name="searchHotel" id="search1" class="searchbox-form" action="" method="GET">
    <div id="contenedorTipoViaje" class="city-container">
	<label id="DestinationCityLabel" for="destinationCity">Destino / Hotel</label>
	<input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="destinationCity" name="cityInput" class="city-input required ui-autocomplete-input valid" data-provide="typeahead" placeholder="Insira uma cidade ou o nome do hotel" type="text">	
	<input value="" id="destinationCityID" style="display:none" type="hidden">
	<input id="hotelSearchType" style="display:none" type="hidden">
	<input id="destinationCityCodeHotelID" style="display:none" type="hidden">
    </div> 
	 	
    <div class="hotelDates-container">
        <div class="date-container" id="fromDateHotelInputContainer">	<!--Departure date input-->
            <label id="fromDateHotelLabel" for="fromCalendarHotel">Entrada</label>
            <input placeholder="dd-mm-aaaa" class="input-date required hasDatepicker valid" id="fromCalendarHotel" name="fromCalendarHotel" type="text">
            <span class="mainSprite calendar"></span>
        </div>
        <div class="date-container" id="toDateHotelInputContainer">	<!--Arrival date input-->
            <label id="toDateHotelLabel" for="toCalendarHotel">Saída</label>  
            <input placeholder="dd-mm-aaaa" class="input-date required hasDatepicker valid" id="toCalendarHotel" name="toCalendarHotel" type="text">
        </div>
    </div>

    <input id="hotelsMinDays" class="ignore" value="1" type="hidden"> 
    <div id="passengersHotel" class="passengersHotel">
        <div class="rooms-container">
            <label for="roomsQty">Quantidade</label>		
            <select class="valid" id="roomsQty">		
                <option value="1">1 Quarto</option>			
                <option value="2">2 Quartos</option>			
                <option value="3">3 Quartos</option>			
                <option value="4">4 Quartos</option>		
            </select>
        </div>
                    
        <div class="ho-passengersContainer">		
            <ul class="passengersList">		

                {{-- Quatro quartos --}}
                @for ($i = 0; $i < 4; $i++)
                <li style="display: list-item;" id="room{{ $i }}" class="">		
                    <label class="room-label roomLabel" style="display: block;">Quarto {{ $i }}</label>		
                    <div class="ho-passengersBox">
                        <div class="ho-passengerBox">		
                            <label for="adults{{ $i }}">Adultos</label>
                            <input style="display:none" value="0" id="adultsRoom{{ $i }}" type="hidden">		
                            <select id="adults{{ $i }}" name="adultsSelector">
                                <option value="1">1</option>
                                <option value="2" selected="selected">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>	
                        </div>
                        <div class="ho-passengerBox">		
                            <label for="childrenRoom{{ $i }}1">Crianças</label>		
                            <select id="childrenRoom{{ $i }}1" name="childrenRoomSelector">
                                <option value="0">0</option>				
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <div class="hot-agesContainer">		
                            <label style="display: none;" id="lblAge1">Idade das crianças</label>		
                            {{-- Até 4 crianças por quarto --}}
                            @for ($j = 0; $j < 4; $j++)
                            <ul id="ulAgeRoom{{ $i }}">	
                                <li style="display: none;" id="childAge{{ $i }}room{{ $j }}">		
                                    <select id="childAge{{ $i }}{{ $j }}" class="sb-age required" name="childAgeSelector-{{ $j }}-{{ $j }}">			
                                        <option value="" selected="selected">?</option>				
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                    </select>
                                </li>	
                            </ul>
                            @endfor
                        </div>
                    </div>

                </li>
                @endfor                        

            </ul>
        </div>
    </div>

    <div class="mod-searchbutton">
            <a class="buttonContainer btn">
                    <span onclick="submitHotelsForm()">Procurar</span>
            </a>
    </div>


</form>
