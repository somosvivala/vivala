<article class="status">
	<div class="row principal margin-t-2">
		<div class="col-sm-2">
			<div class="foto-label">
                            <a href="{{ url($Post->entidade->getUrl()) }}">
                                <div class="round foto quadrado7em">
                                    <div class="avatar-img" style="background-image:url('{{ $Post->entidade->getAvatarUrl() }}')">
                                        </div>
                                </div>
				<div class="titulo-label">{{$Post->entidade->apelido_tratado }}</div>
                            </a>
			</div>
		</div>
		<div class="col-sm-10">
			<p class="status text-center post-descricao">"{{$Post->descricao}}"</p>
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
        @if ( Auth::user()->entidadeAtiva == $Post->entidade )
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['post.destroy', $Post->id] ]) !!}
                {!! Form::button('<i class="fa fa-trash "></i> ', ['type' => 'submit', 'class' => 'btn-icon', 'onclick' => "return confirm('Tem certeza que deseja remover esse post?');"]) !!}

                {!! Form::close() !!}
        @endif
    </div>
</article>
