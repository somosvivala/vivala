@foreach ($data as $hotel)
    <div class="col-sm-4">
        <div class="quimera-hotel" style="background-image: url({!! $hotel->picture->url !!});">
        </div>
    </div>
@endforeach