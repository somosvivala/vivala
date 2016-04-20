<div class="row comentarios">
    @if($Post->novosComentariosByDate($qtdComentariosExibicao))
    @forelse($Post->novosComentariosByDate($qtdComentariosExibicao)->reverse() as $Comentario)
    <li class="col-sm-12 post barra-comentarios padding-b-1" id="barra-comentario-{{ $Comentario->id }}">
        <div class="post-foto-usuario col-sm-2">
            <a href="{{ url($Comentario->author->getUrl()) }}" title="{{ $Comentario->author->nome }}">
                <div class="round foto quadrado3em">
                    <div class="avatar-img" style="background-image:url('{{ $Comentario->author->getAvatarUrl() }}')">
                        </div>
                </div>
            </a>
        </div>
        <div class="post-comentario col-sm-7">
            {{ $Comentario->conteudo }}
        </div>
        <div class="post-qtd-likes col-sm-3 like">
            <span class="qtd-likes">
                @if($Comentario->getQuantidadeLikes() > 1)
                <a href="#" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i>
                    {{ $Comentario->getQuantidadeLikes() }} {{ trans('global.lbl_like_') }}</a>
                @elseif($Comentario->getQuantidadeLikes() == 1)
                <a href="#" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i>
                    {{ $Comentario->getQuantidadeLikes() }} {{ trans('global.lbl_like') }}
                </a>
                @else
                <a href="#comentario/likecomentario/{{ $Comentario->id }}" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}"><i class="fa fa-heart"></i>
                    {{ trans('global.lbl_liker') }}</a>
                @endif
            </span>
        </div>
    </li>
    @empty
    <p class="col-sm-12">{{ trans("global.lbl_comment_not_found") }}</p>
    @endforelse
    <div class="row">
        <div class="col-sm-12 text-center showonhover">
            <a href="/post/{{ $Post->id }}">{{ trans('global.lbl_post_see_complete') }}</a>
        </div>
    </div>
    @endif
</div>
