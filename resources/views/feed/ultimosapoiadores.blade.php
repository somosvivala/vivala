<article class="status">
	<div class="row principal margin-t-2">
		<div class="col-sm-2">
			<div class="foto-label">
                            <a href="{{ url($Post->entidade->getUrl()) }}">
				<img class="foto-avatar" src="{{ $Post->entidade->getAvatarUrl() }}" alt="{{ $Post->entidade->nome }}">
				<div class="titulo-label">{{$Post->entidade->apelido }}</div>
                            </a>
			</div>
		</div>
		<div class="col-sm-10">
			<p class="status text-center post-descricao">"{{$Post->descricao}}"</p>
		</div>
	</div>
	<div class="hora-post">
		<a href="{{ $Post->url }}"> {{ $Post->data_postagem_diff }} </a>

                <br>
        @if ( Auth::user()->id == $Post->entidade->user->id )
                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['post.destroy', $Post->id] ]) !!}
                    {!! Form::button('<i class="fa fa-trash "></i> ', ['type' => 'submit', 'class' => 'btn-icon', 'onclick' => "return confirm('Tem certeza que deseja remover esse post?');"]) !!}

                    {!! Form::close() !!}
            @endif
	</div>
	@include('post._barrainfos')
		<div class="row box-post">
			<div class="col-sm-6 fundo-cheio">
				@include('feed._comentarios', ["qtdComentariosExibicao" => 3])
			</div>
			<div class="col-sm-6 fundo-cheio">
				@include('post._novocomentario')
			</div>
		</div>
	</div>
</article>
