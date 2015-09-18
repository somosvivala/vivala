<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Request;

class NotificacaoController extends Controller {

	public function __construct()
	{
    	//Só passa se estiver logado
    	$this->middleware('auth');
	}

	/**
	 * Retorna a quantidade de notificacoes novas do $tipo para a entidadeAtiva atual 
	 * @param  $tipo 		[seguidor|comentario|like_comentario|like_post|post]
	 * @return integer   
	 */
	public function getChecarnovas($tipo = 'warning') 
	{
		$notificacoes = Auth::user()->entidadeAtiva->notificacoes()->where('readed', false);
		
		//Se nao forneceu o tipo, entao retornar as notificacoes gerais (sem follow e chat)
		if ($tipo == 'warning') {
			$warning = ['seguidor', 'chat'];
			$notificacoes = $notificacoes->whereNotIn('tipo_notificacao', $warning)->get();
		} else {
			$notificacoes = $notificacoes->where('tipo_notificacao', $tipo)->get();
		}
		
		$quantidadeNotificacoes = $notificacoes ? count($notificacoes) : false;
		return $quantidadeNotificacoes;
	}

	/**
	 * Marca todas as notificacoes de $tipo da entidadeAtiva atual para lidas.
	 * @param  $tipo 		[seguidor|comentario|like_comentario|like_post|post]
	 */
	public function getMarcartodascomolidas($tipo = 'warning') 
	{
		$notificacoes = Auth::user()->entidadeAtiva->notificacoes()->where('readed', false);

		//Se nao forneceu o tipo, entao retornar as notificacoes gerais (sem follow e chat)
		if ($tipo == 'warning') {
			$warning = ['seguidor', 'chat'];
			$notificacoes = $notificacoes->whereNotIn('tipo_notificacao', $warning)->get();
		} else {
			$notificacoes = $notificacoes->where('tipo_notificacao', $tipo)->get();
		}

		if ($notificacoes) 
		{
			foreach ($notificacoes as $notificacao) {
				$notificacao->update(['readed' => true]);
			}
		}
	}

	/**
	 * Metodo que recebe a view tanto do provider, quanto por ajax
	 * 
	 * @param  [type] $view [description]
	 * @return  Collection 	as notificacoes do tipo seguidor
	 */
    public function getNotificacoesfollow($view = null)
    {
        $notificacoes = Auth::user()->entidadeAtiva->notificacoesFollow;
        if(Request::ajax()) {
            return view('_notificacoesFollow')->with('notificacoes', $notificacoes);
        }
        $view->with('notificacoes', $notificacoes);
    }

    /**
	 * Metodo que recebe a view tanto do provider, quanto por ajax
	 * 
	 * @param  [type] $view [description]
	 * @return  Collection 	as notificacoes do tipo chat
	 */
    public function getNotificacoesmsg($view)
    {
        $notificacoes = Auth::user()->entidadeAtiva->notificacoesChat;
        $view->with('notificacoes', $notificacoes);
    }


    /**
     * Metodo que recebe a view tanto do provider, quanto por ajax
     * 
     * @param  [type] $view [description]
     * @return  Collection 	as notificacoes do tipo 'geral'(nao seguidor ou chat)
     */
    public function getNotificacoesgeral($view = null)
    {
        $notificacoes = Auth::user()->entidadeAtiva->notificacoesWarning;
        if(Request::ajax()) {
            return view('_notificacoesGeral')->with('notificacoes', $notificacoes);
        }
        $view->with('notificacoes', $notificacoes);
    }
}
