<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Perfil;


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
      $entidadeAtiva = $user->entidadeAtiva;
      $entidadeAtiva = $user->entidadeAtiva;
      $perfil = $entidadeAtiva;

      $follow = $perfil->followPerfil;
      $followedBy = $perfil->followedByPerfil;

        if($filtro == "amigo") {
            $sugestoes = $entidadeAtiva->sugestaoByAmigosEmComum;
        } else if ($filtro == "seguindo") {
            $sugestoes = $entidadeAtiva->sugestaoBySeguindoEmComum;
        } else if ($filtro == "numseguidores") {
            $sugestoes = Perfil::getMaisSeguidos($entidadeAtiva);
        }
        return view('conectar.sugestoes.index', compact('sugestoes', 'perfil', 'follow', 'followedBy', 'filtro', 'user', 'entidadeAtiva'));
    }

}
