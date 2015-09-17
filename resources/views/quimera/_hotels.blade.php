@foreach ($data as $hotel)
    <div class="col-sm-6 quimera-hotel" style="background: #FFFFFF url({!! $hotel->picture->url !!}) no-repeat; height: 20em; background-size: cover;">
        
    </div>
@endforeach