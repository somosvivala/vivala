<?php $dataOrder = 0; ?>
@foreach ($Cidades as $cidade)
    <a href="#" class=" list-group-item autocomplete-cidades{{($dataOrder == 0) ? ' list-focus' : ''}}" data-order="{{$dataOrder}}" data-value="{{ $cidade->id }}">
        <div class="row">
            <span class="col-sm-9 autocomplete-text">{{ $cidade->nome }}</span>
        </div>
    </a>
    <?php $dataOrder++; ?>
@endforeach
