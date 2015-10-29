<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use Session;

class ConectarController extends VivalaBaseController {

    public function __construct(){
        //Só passa se estiver logado
        $this->middleware('auth');
    }

    // Compartilha as sugestões com as views que forem chamadas por esse controller
    public function getSugestoesViajantes($view){
        $sugestoesViajantes = Perfil::getSugestoes(Auth::user()->entidadeAtiva);
        $view->with('sugestoesViajantes', $sugestoesViajantes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::getMaisfotos()->keyBy('id');
        $posts_total = count($posts);
        $posts = $posts->slice(0, env('QUANTIDADE_FEED_POST'), true);

        return view('conectar.index', compact('posts'));
    }

}
