<form novalidate="novalidate" name="searchHotel" id="busca-hoteis">

    <input type="hidden" name="_token" value="{{\Session::token() }}">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-12">
                <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" allowfilter="true" id="destino-hotel" name="destination" placeholder="{{ trans('global.quimera_insert_city_or_hotel_name_ph') }}" value="" type="text" class="form-control">
                <input id="destino-hotel-id" style="display:none" name="destinationId" class="form-control required" value="" type="hidden">
                <div id="lista-destino-hotel" class="lista-autocomplete">     
                    <div class="hotel-list"> 
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <input placeholder="Quando vai? (dd/mm/aaaa)" data-provide="datepicker" data-date-format="dd/mm/yyyy" id="data-partida-hotel" name="fromDate" class="form-control" type="text">
            </div>

            <div class="col-sm-6">
                <input placeholder="Quando volta? (dd/mm/aaaa)"  data-provide="datepicker" data-date-format="dd/mm/yyyy"  class="input-date required hasDatepicker form-control" id="data-retorno-hotel" name="toDate" type="text">
            </div>
        </div>
    </div>
    <div class="col-md-6 margin-b-1">
        <div class="row">
            <div class="col-sm-12">
                <select id="qtd-quartos-hotel" class="form-control">
                    <option value="1">1 {{ trans('global.quimera_travel_room') }}</option>
                    <option value="2">2 {{ trans('global.quimera_travel_room_') }}</option>
                    <option value="3">3 {{ trans('global.quimera_travel_room_') }}</option>
                    <option value="4">4 {{ trans('global.quimera_travel_room_') }}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <ul class="quartos-hotel col-sm-12">
                {{-- Quatro quartos --}}
                @for ($i = 1; $i < 5; $i++)
                    <li id="room{{ $i }}" class="qtd-quartos @if ($i > 1) soft-hide @endif" data-room-id="{{ $i }}">
                        <label class="room-label roomLabel margin-b-1 soft-hide">{{ trans('global.quimera_travel_room') }} {{ $i }}</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="adults{{ $i }}">{{ trans('global.quimera_adult_') }}</label>
                                <input value="0" id="adultsRoom{{ $i }}" type="hidden">
                                <select id="adults{{ $i }}" name="adultsSelector" class="form-control">
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
                            <div class="col-sm-6">
                                <label for="childrenRoom{{ $i }}1">{{ trans('global.quimera_child_') }}</label>
                                <select id="childrenRoom{{ $i }}1" name="childrenRoomSelector" class="form-control">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>

                            <div class="row soft-hide">
                                <label >{{ trans('global.quimera_child_age_') }}</label>
                                <ul id="ulAgeRoom{{ $i }}">
                                {{-- Até 4 crianças por quarto --}}
                                @for ($j = 0; $j < 4; $j++)
                                      <li style="display: none;" id="childAge{{ $i }}room{{ $j }}">
                                          <select id="childAge{{ $i }}{{ $j }}" class="form-control required" name="childAgeSelector-{{ $j }}-{{ $j }}">
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
                                @endfor
                                </ul>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="text-center mod-searchbutton col-md-12 margin-b-2">
            <button class="btn">
                <span onclick="submitHotelsForm()">{{ trans('global.quimera_searchr_lodge') }}</span>
            </button>
        </div>
    </div>

</form>
