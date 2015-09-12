<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NotificacaoController extends Controller {

	public function __construct(){
    	//Só passa se estiver logado
    	$this->middleware('auth');
	}

	


}
