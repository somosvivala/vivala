@if(isset($posts) && count($posts)>0 )
<ul class="lista-posts">

	@forelse($posts as $Post)
        <li class="post col-sm-12">
			@if($Post->tipo_post == 'status')
            	@include('feed.status')
			@elseif($Post->tipo_post == 'foto')
            	@include('feed.foto')
			@endif
        </li>
	@empty
	    <p>Que silêncio, fala alguma coisa aí! :)</p>
	@endforelse
</ul>
@endif
