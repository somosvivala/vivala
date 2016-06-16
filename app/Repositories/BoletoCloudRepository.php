<?php namespace App\Repositories;

/**
 * Classe para centralizar metodos referentes aos boletos da BoletoCloud
 */
class BoletoCloudRepository
{

    //Informacoes sensiveis que serao pegas do env

    public $BOLETOCLOUD_CONTA_BANCO;
    public $BOLETOCLOUD_CONTA_AGENCIA;
    public $BOLETOCLOUD_CONTA_NUMERO;
    public $BOLETOCLOUD_CONTA_CARTEIRA;
    public $BOLETOCLOUD_BENEFICIARIO_NOME;
    public $BOLETOCLOUD_BENEFICIARIO_CPRF;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_CEP;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_UF;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOCALIDADE;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_BAIRRO;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOGRADOURO;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_NUMERO;
    public $BOLETOCLOUD_BENEFICIARIO_ENDERECO_COMPLEMENTO;


    /**
     * Construtor obtendo informacoes necessarias do env
     */
    function __construct()
    {

        $this->BOLETOCLOUD_CONTA_BANCO                       = env('BOLETOCLOUD_CONTA_BANCO');
        $this->BOLETOCLOUD_CONTA_AGENCIA                     = env('BOLETOCLOUD_CONTA_AGENCIA');
        $this->BOLETOCLOUD_CONTA_NUMERO                      = env('BOLETOCLOUD_CONTA_NUMERO');
        $this->BOLETOCLOUD_CONTA_CARTEIRA                    = env('BOLETOCLOUD_CONTA_CARTEIRA');
        $this->BOLETOCLOUD_BENEFICIARIO_NOME                 = env('BOLETOCLOUD_BENEFICIARIO_NOME');
        $this->BOLETOCLOUD_BENEFICIARIO_CPRF                 = env('BOLETOCLOUD_BENEFICIARIO_CPRF');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_CEP         = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_CEP');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_UF          = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_UF');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOCALIDADE  = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOCALIDADE');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_BAIRRO      = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_BAIRRO');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOGRADOURO  = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOGRADOURO');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_NUMERO      = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_NUMERO');
        $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_COMPLEMENTO = env('BOLETOCLOUD_BENEFICIARIO_ENDERECO_COMPLEMENTO');
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
     * @param $numeroSequencial - numero sequecial utilizado para identificar o boleto
     */
    public function gerarBoletoTeste($numeroSequencial)
    {

        /*
         * Exemplo de criação de um boleto utilizando o método HTTP POST. e exibe o conteúdo PDF retornado no navegador.
         * Após obter o PDF do boleto o arquivo é enviado como resposta para visualização no navegador.
         *
         * cURL - http://php.net/manual/pt_BR/book.curl.php
         **/

        #Dados do boleto

        $fields = array(
            'boleto.conta.banco' => $this->BOLETOCLOUD_CONTA_BANCO,
            'boleto.conta.agencia' => $this->BOLETOCLOUD_CONTA_AGENCIA,
            'boleto.conta.numero' => $this->BOLETOCLOUD_CONTA_NUMERO,
            'boleto.conta.carteira' => $this->BOLETOCLOUD_CONTA_CARTEIRA,
            'boleto.beneficiario.nome' => $this->BOLETOCLOUD_BENEFICIARIO_NOME,
            'boleto.beneficiario.cprf' => $this->BOLETOCLOUD_BENEFICIARIO_CPRF,
            'boleto.beneficiario.endereco.cep' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_CEP,
            'boleto.beneficiario.endereco.uf' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_UF,
            'boleto.beneficiario.endereco.localidade' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOCALIDADE,
            'boleto.beneficiario.endereco.bairro' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_BAIRRO,
            'boleto.beneficiario.endereco.logradouro' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_LOGRADOURO,
            'boleto.beneficiario.endereco.numero' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_NUMERO,
            'boleto.beneficiario.endereco.complemento' => $this->BOLETOCLOUD_BENEFICIARIO_ENDERECO_COMPLEMENTO,
            'boleto.emissao'=> '2014-07-11',
            'boleto.vencimento'=> '2020-05-30',
            'boleto.documento'=> 'EX1',
            'boleto.sequencial'=> $numeroSequencial,
            'boleto.titulo'=> 'DM',
            'boleto.valor'=> '1250.43',
            'boleto.pagador.nome'=> 'Alberto Santos Dumont',
            'boleto.pagador.cprf'=> '111.111.111-11',
            'boleto.pagador.endereco.cep'=> '36240-000',
            'boleto.pagador.endereco.uf'=> 'MG',
            'boleto.pagador.endereco.localidade'=> 'Santos Dumont',
            'boleto.pagador.endereco.bairro'=> 'Casa Natal',
            'boleto.pagador.endereco.logradouro'=> 'BR-499',
            'boleto.pagador.endereco.numero'=> 's/n',
            'boleto.pagador.endereco.complemento'=> 'Sítio - Subindo a serra da Mantiqueira',
            'boleto.instrucao'=> array(
                'Atenção! NÃO RECEBER ESTE BOLETO.',
                'Este é apenas um teste utilizando a API Boleto Cloud',
                'Mais info em http://www.boletocloud.com/app/dev/api'
            )
        );

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

}
