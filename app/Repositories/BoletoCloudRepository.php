<?php namespace App\Repositories;

use app\User;
use App\BoletoExperiencia;
use App\InscricaoExperiencia;
use App\Interfaces\BoletoCloudRepositoryInterface;
use App\Experiencia;
use App\Interfaces\ExperienciasRepositoryInterface;

/**
 * Classe para centralizar metodos referentes aos boletos da BoletoCloud
 */
class BoletoCloudRepository extends BoletoCloudRepositoryInterface
{

    //Propriedades e informacoes do Repositorio
    public $BOLETOCLOUD_AUTH_TOKEN;
    public $BOLETOCLOUD_CONTA_TOKEN_API;
    public $BOLETOCLOUD_URL_BASE;
    public $experienciasRepository;

    /**
      * Construtor obtendo informacoes necessarias do env
      * @param $experienciasRepository - Instancia do Repositorio de Experiencias
     */
    function __construct(ExperienciasRepositoryInterface $experienciasRepository)
    {
        $this->experienciasRepository       = $experienciasRepository;

        $sufixo = '';
        //se estivermos em development, adicionar suffixo aos valores do env
        if (app()->environment('development')) {
            $sufixo = '_DEV';
        }

        $this->BOLETOCLOUD_CONTA_TOKEN_API  = env('BOLETOCLOUD_CONTA_TOKEN_API'.$sufixo);
        $this->BOLETOCLOUD_AUTH_TOKEN       = env('BOLETOCLOUD_AUTH_TOKEN'.$sufixo);
        $this->BOLETOCLOUD_URL_BASE         = env('BOLETOCLOUD_URL_BASE'.$sufixo);
    }

    /**
     * Metodo para realizar a geração de um boleto utilizando a API da BoletoCloud
     * @param $experiencia - Uma instancia da Experiencia para a qual sera gerado um boleto
     * @param $pagador - Uma instancia de User o qual sera destinado o boleto
     *
     * @return null
     */
    public function gerarBoleto(Experiencia $experiencia, User $pagador)
    {
        $dadosBoleto['data_emissao'] = \Carbon\Carbon::now()->addDays(-1)->format('Y-m-d');
        $dadosBoleto['data_vencimento'] = $experiencia->proximaOcorrencia->data_ocorrencia->addDays('-1')->format('Y-m-d');
        $dadosBoleto['valor'] = $experiencia->preco;
        $dadosBoleto['instrucao'] = array(
            'Atenção! O pagamento desse boleto confirmará sua inscrição.',
            'Dúvidas ou informações fale com agente em contato@vivala.com.br',
            'Tenha uma ótima experiencia!'
        );

        //Criando instancia no BD do boleto.
        $boleto = $this->createBoletoExperiencia($dadosBoleto, $experiencia, $pagador);

        #Dados do boleto
        $fields = [
            'boleto.conta.token' => $this->BOLETOCLOUD_CONTA_TOKEN_API,
            'boleto.documento'=> 'BO'.$boleto->id.'-EXP'.$boleto->inscricao->experiencia->id,
            'boleto.emissao'=> $boleto->dataEmissaoFormatada,
            'boleto.vencimento'=> $boleto->dataVencimentoFormatada,
            'boleto.valor'=> $boleto->valor,
            'boleto.pagador.nome'=> $boleto->pagador->perfil->nome,
            'boleto.pagador.cprf'=> $boleto->pagador->cpf,
            'boleto.pagador.endereco.cep'=> $boleto->pagador->endereco_cep,
            'boleto.pagador.endereco.uf'=> $boleto->pagador->endereco_uf,
            'boleto.pagador.endereco.localidade'=> $boleto->pagador->endereco_localidade,
            'boleto.pagador.endereco.bairro'=> $boleto->pagador->endereco_bairro,
            'boleto.pagador.endereco.logradouro'=> $boleto->pagador->endereco_logradouro,
            'boleto.pagador.endereco.numero'=> $boleto->pagador->endereco_numero,
            'boleto.pagador.endereco.complemento'=> $boleto->pagador->endereco_complemento,
            'boleto.instrucao'=> $boleto->instrucao
        ];

        #Aplicando formato de formulário
        $fields_string = '';

        foreach($fields as $key=>$value) {
            if(is_array($value)){
                foreach($value as $v){
                    $fields_string .= urlencode($key).'='.urlencode($v).'&';
                }
            }else{
                $fields_string .= urlencode($key).'='.urlencode($value).'&';
            }
        }

        $data = rtrim($fields_string, '&');

        #Pode responder com o boleto ou mensagem de erro
        $accept_header = 'Accept: application/pdf, application/json';

        #Estou enviando esse formato de dados
        $content_type_header = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers = array($accept_header, $content_type_header);

        #Configurações do envio
        $url = $this->BOLETOCLOUD_URL_BASE . '/boletos';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_USERPWD, $this->BOLETOCLOUD_AUTH_TOKEN); #API TOKEN
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);# Basic Authorization
        curl_setopt($ch, CURLOPT_HEADER, true);#Define que os headers estarão na resposta
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); #Para uso com https
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); #Para uso com https

        #Envio
        $response = curl_exec($ch);

        #Principais meta-dados da resposta
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        #Fechar processo de comunicação
        curl_close($ch);

        #Processando a resposta
        $created = 201; #Constante que indica recurso criado (Boleto Criado)

        #Separando header e body na resposta
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $header_array = explode("\r\n", $header);

        #Principais headers
        $boleto_cloud_version = '';
        $boleto_cloud_token = '';
        $location = '';

        foreach($header_array as $h) {
            if(preg_match('/X-BoletoCloud-Version:/i', $h)) {
                $boleto_cloud_version = $h;
            }
            if(preg_match('/X-BoletoCloud-Token:/i', $h)) {
                $boleto_cloud_token = $h;
            }
            if(preg_match('/Location:/i', $h)) {
                $location = $h;
            }
        }

        #Processando sucesso ou falha
        if($http_code == $created){

            //Se deu tudo certo, salvar token do boleto para usar no link p/ 2via
            $boleto->token = str_replace('X-BoletoCloud-Token: ', '', $boleto_cloud_token);
            $boleto->status = 'gerado';
            $boleto->save();

            dd('fim pdf', $boleto);

        } else{

            //Erro e o boleto nao foi criado.
            //portanto nao atualizar status do boleto

        }
    }

    /**
     * Metodo para criacao de uma instancia de BoletoExperiencia
     *
     * @param $dadosBoleto - Array com os possiveis indices ('valor', 'data_emissao', 'data_vencimento' e 'instrucoes')
     * @param $pagador - Instancia do User a qual o boleto é destinado
     */
    public function createBoletoExperiencia($dadosBoleto, Experiencia $experiencia, User $pagador)
    {
        $inscricao = $this->experienciasRepository->getInscricaoUsuario($experiencia, $pagador);

        $boleto = BoletoExperiencia::create($dadosBoleto);
        $boleto->pagador()->associate($pagador);
        $boleto->inscricao()->associate($inscricao);
        $boleto->push();

        $boleto->load('pagador');
        $boleto->load('inscricao');

        return $boleto;
    }



}
