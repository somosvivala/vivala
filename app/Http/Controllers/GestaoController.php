<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\GerarRemessaBoletosRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use Input;
use DB;
use App\Perfil;
use App\Interfaces\BoletoCloudRepositoryInterface;

class GestaoController extends Controller {

    public $boletosRepository;

    /**
     * Construtor recebendo dependencias
     */
    function __construct(BoletoCloudRepositoryInterface $boletosRepository)
    {
        $this->boletosRepository = $boletosRepository;
    }




    /**
     * Retorna a view inicial de gestão
     *
     * @return View
     */
    public function getHome()
    {
        return view('gestao.index');
    }

    /**
     * Retorna o painel de gestão de EXPERIÊNCIAS
     *
     * @return View
     */
    public function getExperiencias()
    {
      return view('gestao.experiencias._index');
    }

    /*
     * Rota para a view de create de experiencias
     */
    public function getCreateexperiencia()
    {
        return view('experiencias.create');
    }

    /*
     * Rota para a view de create de categoria de experiencia
     */
    public function getCreatecategoria()
    {
        return view('experiencias.categorias.create');
    }



    /**
     * Retorna o painel de gestão do LOGGER
     *
     * @return View
     */
    public function getLogger()
    {
      return view('gestao.logger.index');
    }

    /**
     * Retorna o painel de gestão de USUÁRIOS
     *
     * @return View
     */
    public function getUsuarios()
    {
      return view('gestao.basededados.index');
    }

    /**
     * Retorna o JSON da base de dados dos usuários para ser mostrado
     *
     * @return JSON
     */
    public function getUsers()
    {
        $data_inicio = Input::get('data_inicio');
        $data_fim = Input::get('data_fim');

        if(!$data_inicio) {
            $data_inicio =  '2015-10-16 00:13:37'; //Dia do primeiro user
        }
        if(!$data_fim) {
            $data_fim = date('Y-m-d H:i:s');
        }

        if(Auth::user()->isAdmin()) {
            $intervalos = DB::table('perfils')->select(DB::raw("date_trunc('day', created_at) as intervalo"),DB::raw('count(*) as qtd'))->where('created_at', '>', $data_inicio)->where('created_at', '<', $data_fim)->orderBy('intervalo','ASC')->groupBy(DB::raw("intervalo"))->get();
            $total = DB::table('perfils')->where('created_at', '>', $data_inicio)->where('created_at', '<', $data_fim)->count();

        }
        $return = new \stdClass();
        $return->intervalos = $intervalos;
        $return->total = $total;
        $return->inicio = $data_inicio;
        $return->fim = $data_fim;

        return json_encode($return);
    }



    /**
     * Rota para gerar o arquivo remessa dos boletos gerados
     * @param $request - Request para que apenas admins possam fazer essa acao
     */
    public function getGerararquivoremessa(GerarRemessaBoletosRequest $request)
    {
        return $this->boletosRepository->gerarArquivoRemessa();
    }




}
