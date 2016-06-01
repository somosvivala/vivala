<?php namespace App\Http\Controllers;

use App;
use Auth;
use Input;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CotarViagensRequest;
use App\Events\NovaCotacaoViagem;

class CotarViagensController extends Controller {

	public function setOpcaoCotacao($opt)
	{
		if(isset($opt) && $opt) $opt='COTAR'; else $opt='NÃO COTAR';
		return $opt;
	}

	public function setOpcaoTempo($time)
	{
		if(isset($time) && $time) $time='PODE VIAJAR'; else $time='NÃO PODE VIAJAR';
		return $time;
	}

	public function setDatasHorariosRestritos($val)
	{
		if(isset($val) && $val) $val='POSSUI'; else $val='NÃO POSSUI';
		return $val;
	}

	public function setOpcaoAdicional($add)
	{
		if(isset($add) && $add) $add='SIM'; else $add='NÃO';
		return $add;
	}

	public function getForm(CotarViagensRequest $request)
	{
		$result = $request->all();

		// Montando objeto USUÁRIO
		$user = [
			'user-id' => Auth::user()->id,
			'user-username' => Auth::user()->perfil->nome_completo,
			'user-email' => Auth::user()->email
		];

		// MONTANDO O OBJETO FINAL para o EVENTO
		$CotacaoViagem = new \stdClass();

		//Disparando evento para avisando que temos uma nova cotação
		//event(new NovaCotacaoViagem($CotacaoViagem));
		return($request->all());
	}

}
