@if(isset($posts) && count($posts)>0 )
<ul class="lista-posts">
    {{-- @include('feed.ultimosapoiadores') --}}
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
<div class="row text-center wrapper-loadmore">
    <button type="button" id="load-more-posts" data-pagina="{{isset($pagina)?$pagina:1}}" class="margin-t-2 margin-b-2 btn"> ver mais posts!</button>
</div>
@endif
