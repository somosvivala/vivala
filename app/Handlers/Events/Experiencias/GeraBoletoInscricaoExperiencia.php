<?php namespace App\Handlers\Events\Experiencias;

use App\Events\NovoPedidoGeracaoBoletoExperiencia;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Interfaces\BoletoCloudRepositoryInterface;

class GeraBoletoInscricaoExperiencia
{
    //Instancia do repositorio de Boletos
    private $BoletoCloudRepository;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(BoletoCloudRepositoryInterface $boletoRepository)
    {
      $this->BoletoCloudRepository = $boletoRepository;
    }

    /**
     * Handle the event.
     *
     * @param  NovoPedidoGeracaoBoletoExperiencia  $event
     * @return void
     */
    public function handle(NovoPedidoGeracaoBoletoExperiencia $event)
    {
      // Chamando o metodo gerarBoleto
      // do repositorio de boletos para
      // gerar boleto da experiencia
      $this->BoletoCloudRepository->gerarBoleto($event->Experiencia, $event->User);
    }

}
