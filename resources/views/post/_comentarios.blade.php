<div class="row comentarios">
    @if($comentarios)
    @forelse($comentarios->reverse()  as $Comentario)
    <li class="col-sm-12 post barra-comentarios margin-t-1" id="barra-comentario-{{ $Comentario->id }}">
        <div class="post-foto-usuario col-sm-2">
            <a href="{{ url($Comentario->author->getUrl()) }}" title="{{ $Comentario->author->nome }}">
                <div class="round foto quadrado3em">
                    <div class="avatar-img" style="background-image:url('{{ $Comentario->author->getAvatarUrl() }}')">
                        </div>
                </div>
            </a>
        </div>
        <div class="post-comentario col-sm-8">
            {{ $Comentario->conteudo }}
        </div>
        <div class="post-qtd-likes col-sm-2 like">
            <a href="#comentario/likecomentario/{{ $Comentario->id }}" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i></a>
            <span class="qtd-likes">
                @if($Comentario->getQuantidadeLikes() > 1)
                {{ $Comentario->getQuantidadeLikes() }} {{ trans('global.lbl_like_') }}
                @elseif($Comentario->getQuantidadeLikes() == 1)
                {{ $Comentario->getQuantidadeLikes() }} {{ trans('global.lbl_like') }}
                @else
                {{ trans('global.lbl_liker') }}
                @endif
            </span>
        </div>
    </li>
    @empty
    <p class="col-sm-12">{{ trans('global.lbl_comment_not_found') }}</p>
    @endforelse
    @endif
</div>
