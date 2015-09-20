@foreach ($data as $hotel)
    <div class="col-sm-6 quimera-hotel" style="background-image: url({!! $hotel->picture->url !!});">
        
    </div>
@endforeach