<div class="margin-b-2">
    <h4 class="suave margin-b-2">
            {{ trans('global.wannavolunteer_projects_to_follow') }}
    </h4>
</div>
<ul class="sugestoes sugestoes-ongs">

	@if(isset($sugestoesOngs))
	@forelse($sugestoesOngs as $Ong)
		<li class="margin-b-1">
      {!! Form::open(['url' => ['ajax/followong', $Ong->id], 'class' =>'form-ajax', 'method' => 'GET', 'data-callback' => 'followOng('.$Ong->id.')']) !!}
      <button name='btn_seguir' type="submit" class="btn_seguir_ong click-img-no-border" data-id="{{ $Ong->id }}">{{ trans('global.lbl_follow') }}</button>
      <a href="{{ url($Ong->getUrl()) }}" class="click-img-no-border">
        <div class="round foto quadrado3em">
            <div class="avatar-img" style="background-image:url('{{ $Ong->getAvatarUrl() }}')"></div>
        </div>
        <strong class="col-sm-12">{{ $Ong->nome }}</strong>
      </a>
      {!! Form::close() !!}
    </li>
	@empty
	    <p>Nenhuma ong.</p>
	@endforelse
	@endif
</ul>
