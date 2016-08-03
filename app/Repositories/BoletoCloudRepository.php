<?php namespace App\Repositories;

use app\User;
use App\BoletoExperiencia;
use App\InscricaoExperiencia;
use App\Interfaces\BoletoCloudRepositoryInterface;

/**
 * Classe para centralizar metodos referentes aos boletos da BoletoCloud
 */
class BoletoCloudRepository extends BoletoCloudRepositoryInterface
{

    //Informacoes sensiveis que serao pegas do env
    public $BOLETOCLOUD_CONTA_TOKEN_API;

    /**
      Construtor obtendo informacoes necessarias do env
     */
    function __construct()
    {
        $this->BOLETOCLOUD_CONTA_TOKEN_API                     = env('BOLETOCLOUD_CONTA_TOKEN_API');
    }


    /**
     * Metodo para gerar um boleto
     */
    public function gerarBoleto()
    {
        //logica de geracao de boleto
    }

    /**
     * Metodo para testar a geracao de um boleto no sandbox
     */
    public function gerarBoletoTeste(Experiencia $experiencia, User $pagador)
    {
        $dadosBoleto['data_emissao'] = \Carbon\Carbon::now()->format('Y-m-d');
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
            'boleto.emissao'=> $boleto->dataEmissao,
            'boleto.vencimento'=> $boleto->dataVencimento,
            'boleto.valor'=> $boleto->valor,
            'boleto.pagador.nome'=> $boleto->pagador->nome,
            'boleto.pagador.cprf'=> $boleto->pagador->cprf,
            'boleto.pagador.endereco.cep'=> $boleto->pagador->enderecoCep,
            'boleto.pagador.endereco.uf'=> $boleto->pagador->enderecoUf,
            'boleto.pagador.endereco.localidade'=> $boleto->pagador->enderecoLocalidade,
            'boleto.pagador.endereco.bairro'=> $boleto->pagador->enderecoBairro,
            'boleto.pagador.endereco.logradouro'=> $boleto->pagador->enderecoLogradouro,
            'boleto.pagador.endereco.numero'=> $boleto->pagador->enderecoNumero,
            'boleto.pagador.endereco.complemento'=> $boleto->pagador->enderecoComplemento,
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

        #Definindo conteúdo da requisição e tipos de respostas aceitas

        #Pode responder com o boleto ou mensagem de erro
        $accept_header = 'Accept: application/pdf, application/json';

        #Estou enviando esse formato de dados
        $content_type_header = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers = array($accept_header, $content_type_header);

        #Configurações do envio
        $url = 'https://sandbox.boletocloud.com/api/v1/boletos';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_USERPWD, "api-key_Apa_-4G10rXU80t7eM_tCEzAnqxqwj9La6Er8NgvHA0=:token"); #API TOKEN
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
            #Versão da plataforma: $boleto_cloud_version 
            #Token do boleto disponibilizado: $boleto_cloud_token
            #Localização do boleto na plataforma: $location
            #Enviando boleto como resposta:
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename=arquivo-api-boleto-post-teste.pdf');
            echo $body; #Visualização no navegador
        }else{
            #Versão da plataforma: $boleto_cloud_version 
            #Códgio de erro HTTP: $http_code
            #Enviando erro como resposta:
            header('Content-Type: application/json; charset=utf-8');
            echo $body; #Visualização no navegador
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
        $inscricao = $this->getInscricaoUsuario($experiencia, $pagador);

        $boleto = BoletoExperiencia::create($dadosBoleto);
        $boleto->pagador()->associate($pagador);
        $boleto->inscricao()->associate($inscricao);
        $boleto->push();

        return $boleto;
    }



}
