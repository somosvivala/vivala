@if(isset($posts))
<ul class="lista-posts">

	@forelse($posts as $Post)
        <li class="post">
            <article>
				<div>{{$Post->entidade->nome}} disse:</div>
                <h3>{{$Post->titulo}}</h3>
	            <p>{{$Post->descricao}}</p>
				<button class="like-btn">{{'<3'}}</button>
            </article>
        </li>
	@empty
	    <p>Que silêncio, fala alguma coisa aí! :)</p>
	@endforelse
</ul>
@endif
