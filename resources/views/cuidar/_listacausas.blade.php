<h4 class="suave">
	{{ trans('global.wannavolunteer_projects_to_follow') }}
</h4>
<ul class="sugestoes sugestoes-ongs">
	@if(isset($sugestoesOngs))
	@forelse($sugestoesOngs as $Ong)
		<li>
			<!-- Adiciona a abertura do Form -->
			{!! Form::open(['url' => ['ajax/followong', $Ong->id], 'class' => 'form-ajax', 'method' => 'GET']) !!}
				<button type="submit" class='btn_seguir_ong' data-id="{{$Ong->id}}">{{ trans('global.lbl_follow') }}</button>
				<a href="{{ url($Ong->getUrl()) }}">
					<img class="hidden" title='trans("global.lbl_loading")' alt='trans("global.lbl_loading1")'>
					<div class="round foto">
						<div class="cover">
							<img src="{{ $Ong->getAvatarUrl() }}" alt=" {{ $Ong->nome }}">
						</div>
					</div>
					<strong class="col-sm-12">{{ $Ong->nome }}</strong>
					<div class="row localizacao-cidade">
						<div class="col-sm-4 text-right">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="col-sm-8 text-left">
							São Paulo, BR
						</div>
					</div>
				</a>
			{!! Form::close() !!}
		</li>
	@empty
	    <p>{{ trans('global.lbl_ong_not_found') }}</p>
	@endforelse
	@endif
</ul>
