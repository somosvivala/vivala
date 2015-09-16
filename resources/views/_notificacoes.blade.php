 <ul class="col-sm-12 sugestoes sugestoes-viajantes pagina-sugestoes">
    @if(isset($notificacoes))
    @forelse($notificacoes as $Notificacao)
    <li class="col-sm-6">
        <div class="col-sm-4">
            <a href="{{ url($Notificacao->from->getAvatarUrl()) }}">
                <div class="round foto">
                    <div class="cover">
                        <img src="{{ $Notificacao->from->getAvatarUrl() }}" alt=" {{ $Notificacao->from->nome }}">
                    </div>
                </div>
            </a>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8 text-left">
            <a href="{{ url($Notificacao->url) }}">
                <strong>{{ $Notificacao->titulo }}</strong>
                <p>{{ $Notificacao->titulo }}</p>
            </a>
        </div>
    </li>
    @empty
        <p>Sem viajantes pra seguir! :o</p>
    @endforelse
    @endif
</ul> 
