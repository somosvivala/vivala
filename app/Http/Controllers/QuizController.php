<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class QuizController extends VivalaBaseController {

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}


	public function getIndex() {
		return view("quiz.interesses");
	}

}
