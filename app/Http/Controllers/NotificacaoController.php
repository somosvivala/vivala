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

	public function getChecarnovas($tipo = 'seguidor') 
	{
		$notificacoes = Auth::user()->entidadeAtiva->notificacoes()->where('readed', false)->where('tipo_notificacao',$tipo)->get();
		$quantidadeNotificacoes = $notificacoes ? count($notificacoes) : false;
		return $quantidadeNotificacoes;
	}

	public function getMarcartodascomolidas() 
	{
		$notificacoes = Auth::user()->entidadeAtiva->ultimasNotificacoes;

		if ($notificacoes) 
		{
			foreach ($notificacoes as $notificacao) {
				$notificacao->update(['readed' => true]);
			}
		}
	}
}
