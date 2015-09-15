<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;


class SugestaoController extends ConectarController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            parent::__construct();
            $this->middleware('auth');
    }

    /**
    * Retorna a sugestão de seguidores
    *
    * @param  [integer] id do post
    * @return
    */
    public function getViajantes($filtro = "amigo") {
            $user = Auth::user();
            $perfil = $user->perfil;
            if($filtro == "amigo") {
                    $sugestoes = $perfil->sugestaoByAmigosEmComum;
            }elseif($filtro == "seguindo"){
                    $sugestoes = $perfil->sugestaoBySeguindoEmComum;
            }
            return view('conectar.sugestoes.index', compact('sugestoes', 'filtro', 'user', 'perfil'));
    }

}
