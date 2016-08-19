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
    public $BOLETOCLOUD_API_ROUTE;

    public $TARIFA_EMISSAO_BOLETO;

    /**
      * Construtor obtendo informacoes necessarias do env
      * @param $experienciasRepository - Instancia do Repositorio de Experiencias
     */
    function __construct()
    {
        $sufixo = '';
        //se estivermos em development, adicionar suffixo aos valores do env
        if (app()->environment('development')) {
            $sufixo = '_DEV';
        }

        $this->BOLETOCLOUD_CONTA_TOKEN_API  = env('BOLETOCLOUD_CONTA_TOKEN_API'.$sufixo);
        $this->BOLETOCLOUD_AUTH_TOKEN       = env('BOLETOCLOUD_AUTH_TOKEN'.$sufixo);
        $this->BOLETOCLOUD_URL_BASE         = env('BOLETOCLOUD_URL_BASE'.$sufixo);

        //essa variavel independe do ambiente
        $this->BOLETOCLOUD_API_ROUTE         = env('BOLETOCLOUD_API_ROUTE');

        $this->TARIFA_EMISSAO_BOLETO         = env('TARIFA_EMISSAO_BOLETO') ? env('TARIFA_EMISSAO_BOLETO') : '6.54';
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
        $Inscricao = $experiencia->getInscricaoUsuario($pagador);
        $dadosBoleto['data_emissao'] = \Carbon\Carbon::now()->addDays(-1)->format('Y-m-d');
        $dadosBoleto['data_vencimento'] = $Inscricao->dataExperiencia->format('Y-m-d');
        $dadosBoleto['valor'] = $experiencia->preco + $this->TARIFA_EMISSAO_BOLETO;
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
            'boleto.pagador.endereco.numero'=> 's/n',
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
        $url = $this->BOLETOCLOUD_URL_BASE . $this->BOLETOCLOUD_API_ROUTE . '/boletos';

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

            return $boleto;

        } else{

            //caso erro geracao boleto:
            //dd($response);
            //Erro e o boleto nao foi criado.
            //portanto nao atualizar status do boleto
            return false;

        }
    }

    /**
     * Metodo para criacao de uma instancia de BoletoExperiencia
     *
     * @param $dadosBoleto - Array com os possiveis indices ('valor', 'data_emissao', 'data_vencimento' e 'instrucoes')
     * @param $experiencia - Instancia da Experiencia a qual o boleto é destinado
     * @param $pagador - Instancia do User a qual o boleto é destinado
     */
    public function createBoletoExperiencia($dadosBoleto, Experiencia $Experiencia, User $pagador)
    {
        $Inscricao = $Experiencia->inscricoes()->where('perfil_id', $pagador->perfil->id)->first();

        //checando se existe algum boleto gerado (se existir entao a primeira tentativa falhou)
        if ($Inscricao->boleto && !$Inscricao->boleto->isValido) {
            //deletando o boleto que falhou para gerar um novo e nao ficar com a relacao (hasOne com fila)
            $Inscricao->boleto()->delete();
        }

        $Boleto = BoletoExperiencia::create($dadosBoleto);
        $Boleto->pagador()->associate($pagador);
        $Boleto->inscricao()->associate($Inscricao);
        $Boleto->push();

        $Boleto->load('pagador');
        $Boleto->load('inscricao');

        return $Boleto;
    }


    /**
     * Metodo para gerar o arquivo remessa dos boletos gerados 
     */
    public function gerarArquivoRemessa()
    {

        #Token da conta bancária cadastrada
        $fields = array(
        'remessa.conta.token'=> $this->BOLETOCLOUD_CONTA_TOKEN_API

        );


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
        $accept_header = 'Accept: application/pdf, application/json';
        $content_type_header = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        $headers = array($accept_header, $content_type_header);

        $url = $this->BOLETOCLOUD_URL_BASE . $this->BOLETOCLOUD_API_ROUTE . '/arquivos/cnab/remessas';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_USERPWD, $this->BOLETOCLOUD_AUTH_TOKEN); #TOKEN do usuário
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);# Basic Authorization
        curl_setopt($ch, CURLOPT_HEADER, true);#Define que os headers estarÃ£o na resposta
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); #Para uso com https
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); #Para uso com https

        $response = curl_exec($ch);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

        curl_close($ch);

        $created = 201;

        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        $header_array = explode("\r\n", $header);

        $boleto_cloud_version = '';
        $boleto_cloud_token = '';
        $location = '';
        $file_name = '';

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
            if(preg_match('/Content-Disposition: .*filename=([^ ]+)/i', $h)) {
                $file_name = preg_replace('/Content-Disposition:.*filename=/i', '', $h);
            }
        }

        if($http_code == $created){

            header('Content-type: application/text');
            header('Content-Disposition: attachment; filename="'.$file_name.'"' );
            header('Content-Length: ' . strlen($body));

            echo $body;

        }else{
            header('Content-Type: application/text; charset=utf-8');
            echo "NENHUMA REMESSA DISPONÍVEL.";
        }

    }




}
