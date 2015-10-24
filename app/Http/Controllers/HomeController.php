<?php namespace App\Http\Controllers;
use Auth;
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Post;

class HomeController extends ConectarController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Mostra a tela inicial, um feed de noticias baseado gostos do usuario
	| e nos compartilhamentos das entidades que esse usuário segue
	|
	*/

	/**
	 * Mostra o feed de noticias
	 *
	 * @return Response
	 */
	public function getIndex()
	{
            $posts = Post::getUltimos()->take(35)->get();
            return view('home', compact('posts'));
	}

    /**
     * Rota para ser acessada por post para trocar a entidadeAtiva, 
     * @param  $id  id da entidade a ser acessada
     * @todo a ser deprecated, criado um metodo PaginaController@getAcessarcomo($id, $tipo) 
     */
    public function postTrocaentidadeativa($id, Request $request)
    {

        $entidadeAtiva_id = $id;
        $entidadeAtiva_tipo = $request->get('entidadeAtiva_tipo');

        if ($entidadeAtiva_tipo && $entidadeAtiva_id) 
        {
            $entidadeExiste = false;
            switch ($entidadeAtiva_tipo)  {
                case 'ong':
                        # Retorna a ong na lista de ongs do usuario, ou o perfil
                $ong = Ong::find($entidadeAtiva_id);
                $entidadeExiste = $ong ? true : false;
                        break;

                case 'empresa':
                        # Retorna a empresa na lista de empresas do usuario, ou o perfil
                        $empresa = Empresa::find($entidadeAtiva_id);
                $entidadeExiste = $empresa ? true : false;
                        break;

                default:
                        break;
            }

            if ($entidadeExiste) {
                Session::put('entidadeAtiva_id', $entidadeAtiva_id);
                Session::put('entidadeAtiva_tipo', $entidadeAtiva_tipo);
                return redirect('conectar');
            }
        }
	}


}
