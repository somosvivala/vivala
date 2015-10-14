<article class="status">
	<div class="row principal">
		<div class="col-sm-2">
			<div class="foto-label">
                            <a href="{{ url($Post->entidade->getUrl()) }}">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
                            </a>
			</div>
		</div>
		<div class="col-sm-10 status text-center">
			{!! $Post->descricao !!}
		</div>
	</div>
	@include('post._barrainfos')
		<div class="row box-post">
			<div class="col-sm-6 fundo-cheio">
				@include('post._comentarios')
			</div>
			<div class="col-sm-6 fundo-cheio">
				@include('post._novocomentario')
			</div>
		</div>
	</div>
    <div class="hora-post"> 
        {{ $Post->data_postagem_diff }}
        @if ( Auth::user()->id == $Post->entidade->user->id )
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['post.destroy', $Post->id] ]) !!}
                    {!! Form::submit('Remover ', ['class' => 'btn', 'onclick' => "return confirm('Tem certeza que deseja remover esse post?');"]) !!}
            
                {!! Form::close() !!}
        @endif
    </div>
</article>
