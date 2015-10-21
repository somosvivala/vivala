<h3 class="font-bold-upper text-center">Restaurantes
    <small class="sub-titulo">Delícias que alimentam corpo e alma</small>
</h3>
    <div class="row">
<div class="col-md-6">
        <div class="col-sm-12">
            <select id="qtd-quartos-hotel" class="form-control">
                @foreach($chefs->num_pessoas as $num)
                    <option value="{{ $num }}">{{ $num }} adultos</option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="row">
</div>

