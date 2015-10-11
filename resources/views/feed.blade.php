@if(isset($posts) && count($posts)>0 )
<ul class="lista-posts">

	@forelse($posts as $Post)
        <li class="post col-sm-12" data-id="{{$Post->id}}">
			@if($Post->tipo_post == 'status')
            	@include('feed.status')
			@elseif($Post->tipo_post == 'foto')
            	@include('feed.foto')
			@elseif($Post->tipo_post == 'acontecimento')
            	@include('feed.acontecimento')
			@endif
        </li>
	@empty
	    <p>{{ trans('global.feed_kinda_silence') }} :)</p>
	@endforelse
</ul>
@endif
