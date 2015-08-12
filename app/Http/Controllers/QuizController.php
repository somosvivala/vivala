<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Interesse;
use App\Perfil;



class QuizController extends VivalaBaseController {

	public function __construct() 
	{
		//Só passa se estiver logado
		$this->middleware('auth');
	}


	public function getIndex() 
	{
		$interesses = Interesse::all();
		return view("quiz.interesses", compact('interesses'));
	}

	public function postInteresses($id, Request $request) 
	{
		$perfil = Perfil::find($id);
		dd($id, $perfil, $request);
	}


}
