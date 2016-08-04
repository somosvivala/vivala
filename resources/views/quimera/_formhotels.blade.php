<h3 class="font-bold-upper text-center">{{ trans('global.lbl_restaurant_') }}
    <small class="sub-titulo">{{ trans('global.wannatravel_chefsclub_desserts_and_goodies') }}</small>
</h3>
    <div class="row">
<div class="col-md-6">
        <div class="col-sm-12">
            <select id="qtd-quartos-hotel" class="form-control">
                @foreach($chefs->num_pessoas as $num)
                    <option value="{{ $num }}">{{ $num }} {{ trans('global.passenger_adult_') }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="row">
</div>
