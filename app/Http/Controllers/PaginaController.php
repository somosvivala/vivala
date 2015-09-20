<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Ong;
use App\Empresa;
use App\CategoriaEmpresa;
use App\CategoriaOng;
use Session;


class PaginaController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Retorna ate 3 paginas dentre as Ongs/Empresas de um Usuario
	 * @return Array<Ong|Empresa> 
	 */
	public function getMenu($view = null) 
	{
            $paginas = Auth::user()->paginas;
            $paginas = $paginas->take(3);
            // dd($paginas);
            $view->with('paginas', $paginas);
	}

	public function getCriarpagina() 
	{
        $categoriasOngs = CategoriaOng::all();
        $categoriasEmpresas = CategoriaEmpresa::all();
        
        return view('paginas.criar', compact('categoriasOngs','categoriasEmpresas'));
        
	}

    public function getGerenciar() 
	{
        $paginas = Auth::user()->paginas;
     
        return view('paginas.gerenciar', compact('paginas'));
    }

    /**
     * Metodo para trocar a entidadeAtiva atual
     * @param  $id   		Id da entidade a ser acessada
     * @param  $tipo 		Tipo da entidade (ong|empresa|perfil)
     */
    public function getAcessarcomo ($id , $tipo) 
    {
    
        $entidadeAtiva_id = $id;
        $entidadeAtiva_tipo = $tipo;

        if ($entidadeAtiva_tipo && $entidadeAtiva_id) {

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
