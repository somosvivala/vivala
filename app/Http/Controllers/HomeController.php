<?php namespace App\Http\Controllers;

use Auth;
use Socialite;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		/*$this->middleware('auth');*/
	}
	public function login()
	{
		Socialite::with('facebook')->redirect();
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		 return 'Welcome back ,' .Auth::user()->username;

		return 'Hi guest <a href="'.url('/login').'">Logar com feice</a>';
		return view('home');
	}

}
