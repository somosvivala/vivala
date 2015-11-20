<div class="col-xs-12">
   <h3> Tela de Checkout </h3>
   @if ($nome != null)
        @foreach ($nome as $nomeX)
            <p> nome  {{$nomeX}} </p>
        @endforeach
   @else
        <p> $nome veio vaziu! </p>
   @endif

   <hr>

   @if ($documento != null)
        @foreach ($documento as $documentoX)
            <p> documento  {{$documentoX}} </p>
        @endforeach
   @else
        <p> $documento veio vaziu! </p>
   @endif


</div>
