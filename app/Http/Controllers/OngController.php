<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarOngRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CriarOngRequest;
use App\Http\Requests\CropPhotoRequest;
use Session;
use App\Ong;
use Auth;
use Request;
use App;
use Carbon\Carbon;
use App\PrettyUrl;
use Input;
use App\Foto;
use App\Cidade;
use App\Estado;

use App\CategoriaOng;
use Mail;

class OngController extends CuidarController {

	/**
	 * Mostra a pagina da ong
	 * @param   String 			 $prettyUrl 	  Se acessado diretamente, leva a suposta prettyUrl
	 * @return  View             index.blade.php
	 */
	public function index($prettyUrl = null) {


		//se nao veio nada na sessao e nem na url
		if(!$prettyUrl && !Session::has('ong')) {
			App::abort(404);
		}

		//se o dado da sessao for diferente da prettyUrl digitada, pegar da url
		$ong = Session::get('ong', null);
		if (is_null($ong) || $prettyUrl != $ong->getUrl()) {
			Session::forget('ong');
			$prettyUrlObj = PrettyUrl::all()->where('url', $prettyUrl)->first();

			//Se parametro for uma prettyURL, pegar objeto Ong.
			if (!is_null($prettyUrlObj)) {
				$ong = App\Ong::find($prettyUrlObj->prettyurlable_id);
			} else {
				$ong = App\Ong::find($prettyUrl);
				if (!$ong) {
					App::abort(404);
				}
			}			
		}

		// Verifica se o usuário logado tem permissão de edição da Ong.
		// Caso possua, habilita uma flag de edição para a view.
		if (Auth::user()->id == $ong->user->id) {
			$ong->podeEditar = true;
		} else {
			$ong->podeEditar = false;
		}
		return view('ong.show', compact('ong'));
	}

	/**
	 * Form de inserir Ong.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $nome = Request::get('nome');
    	    $categoriaSelecionada = Request::get('categoriaOng');
            $categoriasOngs = CategoriaOng::all();
            
            //Ordenando array de cidades para ficar cidadeID => cidadeNome 
            $cidades = Cidade::all()->keyBy('id');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;

            //Ordenando array de estados para ficar estadoID => estadoNome 
            $estados = Estado::all();
            $estadosArray = array(0 => 'Selecione um Estado');
            foreach ($estados as $estado)
            {
                $estadosArray[$estado->id] = $estado->nome;
            }
            $estados = $estadosArray;
            
            return view('ong.create', compact('categoriasOngs', 'nome', 'categoriaSelecionada', 'cidades', 'estados') );
	}


	/**
	 * Salva a Ong no BD e redireciona pra home, 
	 * criando também a prettyUrl associada com essa Ong
	 *
	 * @return Response
	 */
	public function store(CriarOngRequest $request)
	{
                
                $novaOng = Auth::user()->ongs()->create($request->all());
                $novaOng->responsavel()->associate(Auth::user()->perfil)->push();
		$novaPrettyUrl = new PrettyUrl();
                $novaPrettyUrl->tipo = 'ong';

                $foto = Request::input('foto');
                
                if ($foto && $foto > 0) {
                    $novaOng->fotos()->save(Foto::find($foto));
                }                


                $User = Auth::user();
                Mail::send('emails.obrigadoong', ['user' => $User], function ($message) use ($User) {
                    $message->to($User->email, $User->username)->subject('Teste Email!');
                    $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
                });  

                //se ja nao existir uma ong com essa prettyUrl
                $novaPrettyUrl->url = $novaPrettyUrl->giveAvailableUrl($novaOng->nome);
                $novaOng->prettyUrl()->save($novaPrettyUrl);

                Session::put('entidadeAtiva_id', $novaOng->id);
                Session::put('entidadeAtiva_tipo', 'ong');
		return redirect('/ong/trocacapa/'.$novaOng->id);
	}

	/**
	 * Mostra a ong
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ong = Ong::findOrFail($id);
		return view('ong.show', compact('ong'));
	}

        /**
	 * Mostra todas as ongs e um filtro
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function ongs()
	{
            $ongs = Ong::all();
            $categorias = Ong::getCategoriasComOngs();
            $cidades = Ong::getCidadesComOngs();

            //Arrumando array de cidades para select 
            $cidadesArray = array(0 => 'Selecione uma Cidade');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;
        
            $categoriasArray = array(0 => 'Selecione uma Categoria');
            foreach ($categorias as $cidade)
            {
                $categoriasArray[$cidade->id] = $cidade->nome;
            }
            $categorias = $categoriasArray;

            return view('cuidar.ongs', compact('ongs','categorias', 'cidades'));
        }

	/**
	 * Mostra todas as ongs e um filtro
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function sobre($id)
	{
		$Ong = Ong::findOrFail($id);
		$voluntarios = $Ong->voluntarios;
		$responsavel = $Ong->responsavel;

		return view('cuidar.sobreong', compact('Ong', 'responsavel', 'voluntarios'));
	}


        public function getTrocacapa($id=0)
        {
            $user = Auth::user();
            $ong = Ong::findOrFail($id);
            $fotoCapa = $ong->getCapaUrl();
            //Verificando se usuario logado é owner da ong atual
            if ($ong->user->id != $user->id) {
                //Criar mensagens de erro padrão em configurações??
                App::abort(403, 'Ops, aparentemente voce não tem permissão para editar as informações dessa Ong');
            }

            //Trocando entidadeAtiva para essa ong
            Session::put('entidadeAtiva_id', $ong->id);
            Session::put('entidadeAtiva_tipo', 'ong');

            $ong->url = $ong->getUrl();
            return view('ong.trocacapa', compact('user', 'ong', 'fotoCapa'));
        }

        public function edit($id=0)
        {
            $ong = Ong::findOrFail($id);
            $user = Auth::user();
           
            //Verificando se usuario logado é owner da ong atual
            //TODO: Model de permissoes.. 
            if ($ong->user->id != $user->id) {
                //Criar mensagens de erro padrão em configurações??
                App::abort(403, 'Ops, aparentemente voce não tem permissão para editar as informações dessa Ong');
            }

            $foto = $ong->getAvatarUrl();
            $fotoCapa = $ong->getCapaUrl();
            $categoriaSelecionada = ($ong->categoria ? $ong->categoria->id : null);
            $categoriasOngs = CategoriaOng::all();
            $nome = $ong->nome;

            //Ordenando array de cidades para ficar cidadeID => cidadeNome 
            $cidades = Cidade::all()->keyBy('id');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;

            //Ordenando array de estados para ficar estadoID => estadoNome 
            $estados = Estado::all();
            $estadosArray = array(0 => 'Selecione um Estado');
            foreach ($estados as $estado)
            {
                $estadosArray[$estado->id] = $estado->nome;
            }
            $estados = $estadosArray;   
            
           

            //Trocando entidadeAtiva para essa ong
            Session::put('entidadeAtiva_id', $ong->id);
            Session::put('entidadeAtiva_tipo', 'ong');

            $ong->url = $ong->getUrl();
            return view('ong.edit', compact('user', 'ong', 'foto', 'fotoCapa', 'nome', 'categoriaSelecionada', 'categoriasOngs', 'cidades', 'estados'));
	}

	/**
	 * Atualiza a Ong e a prettyUrl da ong
	 * @param  Integer                    $id      Id da Ong
	 * @param  Requests\EditarOngRequest $request Request personalizado da Ong (trata tamanho do input)
	 * @return View                             View da Ong modificada
	 */
    public function update($id, Requests\EditarOngRequest $request)
    {
        $ong = Ong::findOrFail($id);
        $ong->update($request->all());

        //Salvando foto da ong;
		$file = Input::file('image');
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) {
	        	
	        	/* Settando tipo da foto atual para null */
	        	$currentAvatar = $ong->avatar;
	        	$currentAvatar->tipo = null;
	        	$currentAvatar->save();

	        	$foto = new Foto([
	        			'path' => $destinationPath . $filename,
	        			'tipo' => 'avatar' ]);
	        	$ong->fotos()->save($foto);
	        }
	    }

        //Atualiza a url correspondente
        $ong->prettyUrl()->update([ 'url' => $request->url ]);
		return view('ong.show', compact('ong'));
    }


    /**
     * Supostamente pega voluntarios de uma ong por POST falta testar
     * @param  [type] $idOng          [description]
     * @param  [type] $numVoluntarios [description]
     * @return [type]                 [description]
     */
    public function postGetvoluntarios($idOng, $numVoluntarios)
    {
    	$ong = Auth::user()->ongs->find($idOng);
    	$voluntarios = ($ong != null) ? $ong->voluntarios->take($numVoluntarios) : [];
    }


    /**
     * Deleta a Ong.
     * @param $id -> id da ong a ser deletada
     */
    public function destroy($id)
    {
        $ong = Ong::findOrFail($id);
        $user = Auth::user();

        //Se a Ong a ser deletada pertencer ao usuario logado. 
        if ($user->id == $ong->user->id) {
            $ong->delete();
        } else {
            App::abort(403, 'Voce nao tem permissão para deletar uma vaga que não te pertence.');
        }

        return view('home');
    }

}
