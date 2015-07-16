@if(isset($posts))
<ul class="lista-posts">

	@forelse($posts as $Post)
        <li class="post col-sm-12">
            @include('post.status')
        </li>
	@empty
	    <p>Que silêncio, fala alguma coisa aí! :)</p>
	@endforelse
</ul>
@endif
