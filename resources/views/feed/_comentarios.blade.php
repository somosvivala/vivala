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
          <a href="#comentario/likecomentario/{{ $Comentario->id }}" class="like-btn-comentario like-btn {{ $Comentario->likedByMe() }}">
            <i class="fa @if(Auth::user()->entidadeAtiva->likeComentario->find($Comentario->id)) fa-heart @else fa-heart-o @endif"></i>
          </a>
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
    <p class="col-sm-12">{{ trans("global.lbl_comment_not_found") }}</p>
    @endforelse
    <div class="row">
        <div class="col-sm-12 text-center showonhover">
            <a href="/post/{{ $Post->id }}">{{ trans('global.lbl_post_see_complete') }}</a>
        </div>
    </div>
    @endif
</div>
