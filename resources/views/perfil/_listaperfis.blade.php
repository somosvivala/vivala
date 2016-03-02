@foreach ($perfils as $perfil)
  <a href="{{ url("/perfil/{$perfil->getUrl()}") }}" class="list-group-item list-perfil-item" data-value="{{ $perfil->user_id }}">
      <div class="round foto quadrado3em">
          <div class="avatar-img" style="background-image:url('{{ $perfil->photo }}')"></div>
      </div>
      <span class="col-sm-9 autocomplete-text">{{ $perfil['nome_completo'] }}</span>
  </a>
@endforeach
<!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-l-no padding-r-no">
  <button class="btn btn-block btn-acao click-img-no-border">{{ trans('global.lbl_seemore') }}</button>
</div-->
