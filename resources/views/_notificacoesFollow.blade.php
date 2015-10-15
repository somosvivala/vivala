 <ul class="col-sm-12">
    @if(isset($notificacoes))
    @forelse($notificacoes as $Notificacao)
    <li class="row">
        <div class="col-sm-4">
            <a href="{{ url($Notificacao->from->getUrl()) }}">
                <div class="round foto-avatar">
                    <div class="cover">
                        <img src="{{ $Notificacao->from->getAvatarUrl() }}" alt=" {{ $Notificacao->from->nome }}">
                    </div>
                </div>
            </a>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8 text-left">
            <a href="{{ url($Notificacao->url) }}">
                <strong class="font-bold-upper">{{ $Notificacao->titulo }}</strong>
                <p>{{ $Notificacao->mensagem }}</p>
                <small>{{ $Notificacao->data_postagem_diff }}</small>
            </a>
        </div>
    </li>
    @empty
        <p>{{ trans('global.lbl_follower_no') }}</p>
    @endforelse
    @endif
</ul>
