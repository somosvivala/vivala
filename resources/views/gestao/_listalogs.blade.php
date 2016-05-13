<ul class="list-group">
    @foreach ($Logs as $log)
        <li class="list-group-item">
        <p>
            <span> {{ $log->created_at->diffForHumans() }} </span>
            <a href="{{ $log->author->getUrl() }}"> {{ $log->author->apelido }}</a> 
            <span> {{ $log->descricao }} <span>
        </p>
        </li>
    @endforeach
</ul
