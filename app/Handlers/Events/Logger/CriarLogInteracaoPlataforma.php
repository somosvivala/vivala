<?php namespace App\Handlers\Events\Logger;

use App\Events\NovaInteracaoPlataforma;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Interfaces\LoggerRepositoryInterface;

class CriarLogInteracaoPlataforma
{

    private $logger;

    /**
     * Create the event handler.
     * @param LoggerRepositoryInterface - Inserindo dependencia
     * no controller assim o laravel vai servir uma instancia
     * de LoggerRepository
     *
     * @return void
     */
    public function __construct(LoggerRepositoryInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the event.
     *
     * @param  NovaInteracaoPlataforma  $event
     * @return void
     */
    public function handle(NovaInteracaoPlataforma $event)
    {
        $this->logger->saveLog($event->log);
    }

}
