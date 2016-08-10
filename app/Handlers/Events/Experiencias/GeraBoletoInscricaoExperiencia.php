<?php namespace App\Handlers\Events\Experiencias;

use App\Events\NovoPedidoGeracaoBoletoExperiencia;
use App\Interfaces\BoletoCloudRepositoryInterface;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class GeraBoletoInscricaoExperiencia
{

    private $boletoCloudRepository;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(BoletoCloudRepositoryInterface $boletoRepository)
    {
        $this->boletoCloudRepository = $boletoRepository;
    }

    /**
     * Handle the event.
     *
     * @param  NovoPedidoGeracaoBoletoExperiencia  $event
     * @return void
     */
    public function handle(NovoPedidoGeracaoBoletoExperiencia $event)
    {
        $this->boletoCloudRepository->gerarBoleto($event->experiencia, $event->user);
    }

}
