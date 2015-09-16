<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

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
	public function getChecarnovas($tipo = 'seguidor') 
	{
		$notificacoes = Auth::user()->entidadeAtiva->notificacoes()
			->where('readed', false)
			->where('tipo_notificacao',$tipo)
			->get();
		
		$quantidadeNotificacoes = $notificacoes ? count($notificacoes) : false;
		return $quantidadeNotificacoes;
	}

	/**
	 * Marca todas as notificacoes de $tipo da entidadeAtiva atual para lidas.
	 * @param  $tipo 		[seguidor|comentario|like_comentario|like_post|post]
	 */
	public function getMarcartodascomolidas($tipo = 'seguidor') 
	{
		$notificacoes = Auth::user()->entidadeAtiva->notificacoes()
			->where('readed', false)
			->where('tipo_notificacao', $tipo)
			->get();

		if ($notificacoes) 
		{
			foreach ($notificacoes as $notificacao) {
				$notificacao->update(['readed' => true]);
			}
		}
	}

        public function getNotificacoesFollow($view){
            $notificacoes = Auth::user()->entidadeAtiva->notificacoesFollow;
            $view->with('notificacoes', $notificacoes);
        }
        
        public function getNotificacoesMsg($view){
            $notificacoes = Auth::user()->entidadeAtiva->notificacoesChat;
            $view->with('notificacoes', $notificacoes);
        }

        public function getNotificacoesGeral($view){
            $notificacoes = Auth::user()->entidadeAtiva->notificacoesWarning;
            $view->with('notificacoes', $notificacoes);
        }
}
