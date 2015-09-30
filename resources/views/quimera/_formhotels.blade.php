<form novalidate="novalidate" name="searchHotel" id="search1" class="searchbox-form" action="" method="GET">

<div class="row">
  <div id="contenedorTipoViaje" class="city-container col-md-12 margin-b-1">
  	<label id="DestinationCityLabel" for="destinationCity">{{ trans('global.lbl_travel_to') }} / {{ trans('global.lbl_hotel') }}</label>
  	<input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="destinationCity" name="cityInput" class="city-input required ui-autocomplete-input valid col-md-12" data-provide="typeahead" placeholder="{{ trans('global.quimera_insert_city_or_hotel_name_ph') }}" type="text">
  	<input value="" id="destinationCityID" style="display:none" type="hidden">
  	<input id="hotelSearchType" style="display:none" type="hidden">
  	<input id="destinationCityCodeHotelID" style="display:none" type="hidden">
  </div>
</div>

  <div class="row">
    <div id="contenedorQuartos" class="hotelDates-container col-md-12 margin-b-1">
      <div class="date-container col-md-6 pull-left" id="fromDateHotelInputContainer">	<!--Departure date input-->
        <label id="fromDateHotelLabel" for="fromCalendarHotel">{{ trans('global.quimera_entrance') }}</label>
        <input placeholder="{{ trans('global.date_dd_mm_yyyy') }}" class="input-date required hasDatepicker valid" id="fromCalendarHotel" name="fromCalendarHotel" type="text">
        <span class="mainSprite calendar"></span>
      </div>
      <div class="date-container col-md-6 pull-right" id="toDateHotelInputContainer">	<!--Arrival date input-->
        <label id="toDateHotelLabel" for="toCalendarHotel">{{ trans('global.quimera_exit') }}</label>
        <input placeholder="{{ trans('global.date_dd_mm_yyyy') }}" class="input-date required hasDatepicker valid" id="toCalendarHotel" name="toCalendarHotel" type="text">
        <span class="mainSprite calendar"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <input id="hotelsMinDays" class="ignore" value="1" type="hidden">
    <div id="passengersHotel" class="passengersHotel container-fluid">
        <div class="rooms-container container-fluid">
            <label for="roomsQty" class="col-md-6 pull-left">{{ trans('global.quimera_travel_quantity_') }}</label>
            <select class="mostraQuartosHotel valid col-md-8">
                <option value="1">1 {{ trans('global.quimera_travel_room') }}</option>
                <option value="2">2 {{ trans('global.quimera_travel_room_') }}</option>
                <option value="3">3 {{ trans('global.quimera_travel_room_') }}</option>
                <option value="4">4 {{ trans('global.quimera_travel_room_') }}</option>
            </select>
        </div>
  </div>
        <div class="ho-passengersContainer container-fluid">
            <ul class="passengersList">
                {{-- Quatro quartos --}}
                @for ($i = 1; $i < 5; $i++)
                <li id="room{{ $i }}" class="qtd-quartos @if ($i > 1) soft-hide @endif" data-room-id="{{ $i }}">
                    <label class="room-label roomLabel">{{ trans('global.quimera_travel_room') }} {{ $i }}</label>
                    <div class="ho-passengersBox">
                        <div class="ho-passengerBox">
                            <label for="adults{{ $i }}">{{ trans('global.quimera_adult_') }}</label>
                            <input value="0" id="adultsRoom{{ $i }}" type="hidden">
                            <select id="adults{{ $i }}" name="adultsSelector" class="adultsRoom">
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
                            <label for="childrenRoom{{ $i }}1">{{ trans('global.quimera_child_') }}</label>
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
                            <label style="display: none;" id="lblAge1">{{ trans('global.quimera_child_age_') }}</label>
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

    <div class="mod-searchbutton container-fluid">
      <button class="buttonContainer col-md-6 btn btn-acao pull-right">
        <span onclick="submitHotelsForm()">{{ trans('global.quimera_searchr_lodge') }}</span>
      </button>
    </div>
</form>
