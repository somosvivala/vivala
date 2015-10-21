<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;
use View;
use Auth;
use Illuminate\Http\Request;

class ViajarController extends VivalaBaseController {

	var $sugestoesEmpresas;

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	// Compartilha as sugestões com as views que forem chamadas por esse controller
	public function getSugestoesEmpresas($view){
		$sugestoesEmpresas = Empresa::getSugestoes(Auth::user()->entidadeAtiva);
		$view->with('sugestoesEmpresas', $sugestoesEmpresas);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $chefs = new \stdClass();
            $chefs->num_pessoas = array(1,2,3,4,5);
            $r1= new \stdClass();
            $r1->restaurante = "Restaurante 1";
            $r1->endereco = "Rua São Gonçalo, 4-37";
            $r1->tipo_cozinha = "Japonesa";
            $r1->preco = 3;
            $r1->id = 1;
            $r1->qtd_beneficios = 3;
            $r1->desconto = "50%";
            $r1->imagem = "http://cdn-us.chefsclub.com.br/uploads/place/197/web/cover-old/1202201595540.jpg";
            $r1->link = "https://www.chefsclub.com.br/restaurantes/belo-horizonte/mr-tomy-delivery-2160";

            $r2= new \stdClass();
            $r2->restaurante = "Restaurante 2";
            $r2->endereco = "Rua São Gonçalo, 4-37";
            $r2->tipo_cozinha = "Japonesa";
            $r2->preco = 1;
            $r2->id = 2;
            $r2->qtd_beneficios = 1;
            $r2->desconto = "30%";
            $r2->imagem = "http://cdn-us.chefsclub.com.br/uploads/place/197/web/cover-old/1202201595540.jpg";
            $r2->link = "https://www.chefsclub.com.br/restaurantes/belo-horizonte/mr-tomy-delivery-2160";

            $chefs->restaurantes = array($r1, $r2);

            return view('viajar.index' , compact('chefs') );
	}
}
