 <ul class="col-sm-12">
    @if(isset($notificacoes))
    @forelse($notificacoes as $Notificacao)
    <li class="row">
        <div class="col-sm-4">
            <a href="{{ isset($Notificacao->from) ? url($Notificacao->from->getUrl()) : '' }}">
                <div class="round foto-avatar">
                    <div class="cover">
                        <div class="round foto quadrado7em foto-perfil">
                            <div class="avatar-img" style="{{ isset($Notificacao->from) ? 'background-image:url($Notificacao->from->getAvatarUrl())' : '/img/nophoto.jpg'}}">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8 text-left">
            <a href="{{ url($Notificacao->url) }}">
                <strong class="font-bold-upper">{{ $Notificacao->titulo }}</strong>
                <p>{{ $Notificacao->mensagem }}</p>
            </a>
        </div>
    </li>
    @empty
        <p>{{ trans('global.lbl_message_no') }}</p>
    @endforelse
    @endif
</ul>
