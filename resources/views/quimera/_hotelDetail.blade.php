<div>
    <div class="foto-fundo foto-header" style="background-image:url('{{ $data['extra']->pictures[0]->url}}/720x400?truncate=true');">
        <h2>{{ $data['extra']->name }}</h2>
    </div>
    @foreach($data['extra']->pictures as $foto)
    <img src="{{ $foto->url}}/50x50?truncate=true">
    @endforeach
    <div class="">
        <p>{{ $data['extra']->information }}</pre>
    </div>

    {{ count($data['data']->roomClusters) }} Opções disponíveis

    @foreach($data['data']->roomClusters as $roomCluster)
    <div class="room-cluster">
        @foreach($roomCluster->roompacks as $roompack)
            @foreach($roompack->rooms as $room)
            {{ $room->name }}<br>
            {{ $room->roomCode }}<br>
            {{ $room->roomTypeId }}<br>
            {{ $room->availability }}<br>
            @endforeach
        @endforeach
    </div>
    @endforeach

</div>
<?php 
/**
 *  data =>  dados de disponibilidade e informações de quartos
 *  extra => Informações sobre o hotel
 */ 
?>
<?php dd($data['data'], $data['extra']); ?>
