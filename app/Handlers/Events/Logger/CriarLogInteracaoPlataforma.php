<?php namespace App\Handlers\Events\Logger;

use App\Events\NovaInteracaoPlataforma;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Interfaces\LoggerRepositoryInterface;

class CriarLogInteracaoPlataforma
{

    //Instancia de LoggerRepository
    private $logger;

    /**
     * Constructor do handler, constroi o objeto ja com suas dependencias
     *
     * @param LoggerRepositoryInterface - Inserindo dependencia
     * na classe, assim o laravel vai servir uma instancia
     * de LoggerRepository no lugar da interface
     */
    public function __construct(LoggerRepositoryInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Quando alguma acao trackeavel acontecer, devo persistir os dados no BD.
     * Portanto chamar quem pode fazer isso, 'LoggerRepository'
     *
     * @param  NovaInteracaoPlataforma  $event
     */
    public function handle(NovaInteracaoPlataforma $event)
    {
        //Usando da minha instancia de LoggerRepository
        $this->logger->saveLog($event->log);
    }

}
