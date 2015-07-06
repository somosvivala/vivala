<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

use App\Empresa;
use Illuminate\Http\Request;

class ViajarController extends Controller {

	var $sugestoesEmpresas;

	public function __construct(){
		// Compartilha as sugestões com as views que forem chamadas por esse controller
		$sugestoesEmpresas = Empresa::all();
		View::share('sugestoesEmpresas', $sugestoesEmpresas);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('viajar.index' );
	}
}
