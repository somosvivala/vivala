<?php $dataOrder = 0; ?>
@foreach ($result as $place)
    <a href="#" class="list-group-item autocomplete-rodoviario{{($dataOrder == 0) ? ' list-focus' : ''}}" data-order="{{$dataOrder}}" data-value="{{ $place->slug }}">
        <div class="row">
            <span class="col-sm-9 autocomplete-text">{{ $place->place_name }}</span>
        </div>
    </a>
    <?php $dataOrder++; ?>
@endforeach
