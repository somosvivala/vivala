<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarVagaRequest;
use App\Http\Requests\CriarVagaRequest;
use App\Vaga;
use Auth;
use App;

use Illuminate\Database\Eloquent\Collection;
use App\Cidade;
use App\Ong;
use App\Estado;
use App\CategoriaVaga;
use App\Foto;
use App\Post;

use Request;
use Mail;


class VagaController extends CuidarController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $causas = Vaga::all(); 
        $categorias = Vaga::getCategoriasComVagas();
        $cidades = Vaga::getCidadesComVagas();
        $ongs = Vaga::getOngsComVagas();            

        $cidadesArray = array(null => 'Cidade');
        foreach ($cidades as $cidade)
        {
            $cidadesArray[$cidade->id] = $cidade->nome;
        }
        $cidades = $cidadesArray;

        //Montando array de ongs para select
        $ongsArray = array(null => 'Projeto');
        foreach ($ongs as $ong)
        {
            $ongsArray[$ong->id] = $ong->nome;
        }
        $ongs = $ongsArray;

        //Montando array de categorias para select
        $categoriasArray = array(null => 'Categoria'); 
        foreach ($categorias as $categoria)
        {
            $categoriasArray[$categoria->id] = $categoria->nomeTraduzido;
        }
        $categorias = $categoriasArray;

        return view('cuidar.vagas', compact('causas','categorias', 'cidades', 'ongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        //Checando se posso criar vagas, (se tenho ongs)
        if (count(Auth::user()->ongs) > 0)
        {
            //Obtendo ongs do usuario 
            $ongs = Auth::user()->ongs;
            $ongSelecionada = null;
            $estadoSelecionado = null;
            $categoriaSelecionada = null;
            $cidadeSelecionada = null;
            
            //Montando array de ongs para select 
            $ongsArray = array(null => 'Projeto');
            foreach ($ongs as $ong)
            {
                $ongsArray[$ong->id] = $ong->nome;
            }
            $ongs = $ongsArray;

            $categoriasVaga = CategoriaVaga::all();

            //Ordenando array de cidades para ficar cidadeID => cidadeNome 
            $cidades = Cidade::all()->keyBy('id');
            $cidadesArray = array(null => 'Cidade');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;

            //Ordenando array de estados para ficar estadoID => estadoNome 
            $estados = Estado::all();
            $estadosArray = array(null => 'Estado');
            foreach ($estados as $estado)
            {
                $estadosArray[$estado->id] = $estado->nome;
            }
            $estados = $estadosArray; 


            return view('vaga.create', compact('categoriasVaga', 'ongs', 'cidades', 'estados', 'ongSelecionada', 'cidadeSelecionada', 'estadoSelecionado', 'categoriaSelecionada') );

        } else {
            App::abort(403, "Voce não possui nenhum Projeto cadastrado para criar novas Vagas");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CriarVagaRequest $request)
    {
        $ongResponsavel = Ong::find($request->get('ong'));
       
        //Checando se posso criar vagas
        if (!($ongResponsavel->user->id === Auth::user()->id)) {
            App::abort(403, "Apenas ongs tem permissão para criar Vagas");
        }

        //Criando uma vaga com os campos do formulario
        $novaVaga = $ongResponsavel->vagas()->create($request->all());

        $foto = Request::input('foto');

        if ($foto && $foto > 0) {
            $novaVaga->fotos()->save(Foto::find($foto));
        }                

        // Faz um post de criação de vaga
        $novoPost = new Post();
        $novoPost->descricao = "<h1><i class='fa fa-heart'></i></h1><a href='".url('/vagas/'.$novaVaga->id)."' class=''>".$ongResponsavel->nome." criou uma vaga em ".$novaVaga->cidade->nome.",".$novaVaga->estado->sigla."</a>";
        $novoPost->tipo_post = 'acontecimento';

        //Salvando novoPost para entidadeAtiva
        $ongResponsavel->posts()->save($novoPost);

        //Setta o responsavel da vaga como sendo o perfil da ong
        $novaVaga->responsavel()->associate(Auth::user()->perfil);
        $novaVaga->push();

        return redirect('vagas/'.$novaVaga->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vaga = Vaga::findOrFail($id);
        $voluntarios = $vaga->voluntarios;
        return view('vaga.show', compact('vaga', 'voluntarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vaga = Vaga::findOrFail($id);
        $categoriaSelecionada = ($vaga->categoria ? $vaga->categoria->id : null);
        $cidadeSelecionada = ($vaga->cidade ? $vaga->cidade->id : null);
        $estadoSelecionado = ($vaga->estado ? $vaga->estado->id : null);
       
        //@TODO: Arranjar meio seguro de pegar ongs, se alguma outra entidade for owner talvez de problema.
        $ongSelecionada = $vaga->owner->id;

        if (!$vaga->podeEditar) {
            App::abort(403, "Voce não tem permissao para editar essa Vaga");
        }

        //Obtendo ongs do usuario 
        $ongs = Auth::user()->ongs;

        //Montando array de ongs para select 
        $ongsArray = array(0 => 'Projeto');
        foreach ($ongs as $ong)
        {
            $ongsArray[$ong->id] = $ong->nome;
        }
        $ongs = $ongsArray;

        $categoriasVaga = CategoriaVaga::all();

        //Ordenando array de cidades para ficar cidadeID => cidadeNome 
        $cidades = Cidade::all()->keyBy('id');
        foreach ($cidades as $cidade)
        {
            $cidadesArray[$cidade->id] = $cidade->nome;
        }
        $cidades = $cidadesArray;

        //Ordenando array de estados para ficar estadoID => estadoNome 
        $estados = Estado::all();
        $estadosArray = array(0 => 'Estado');
        foreach ($estados as $estado)
        {
            $estadosArray[$estado->id] = $estado->nome;
        }
        $estados = $estadosArray; 


        return view('vaga.edit', compact('vaga', 'categoriasVaga', 'ongs', 'cidades', 'estados', 'categoriaSelecionada', 'cidadeSelecionada', 'estadoSelecionado', 'ongSelecionada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, EditarVagaRequest $request)
    {
        $vaga = Vaga::findOrFail($id);


        if (!$vaga->podeEditar) {
            App::abort(403, "Voce não tem permissao para editar essa Vaga");
        }

        $vaga->update($request->all());

        $foto = Request::input('foto');

        if ($foto && $foto > 0) {
            $vaga->fotos()->save(Foto::find($foto));
        }                

        $voluntarios = $vaga->voluntarios;
        return view('vaga.show', compact('vaga', 'voluntarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::findOrFail($id);
        $user = Auth::user();

        //Se a Vaga a ser deletada pertencer a alguma entidade do usuario 
        //logado. 
        if ($user->id == $vaga->owner->user->id) {
            $vaga->delete();
        } else {
            App::abort(403, 'Voce nao tem permissão para deletar uma vaga que não te pertence.');
        }

        return view('home');
    }

    /**
     * Setta o Perfil de $id como voluntario na Vaga de $vagaId
     * @param  [type] $id      [description]
     * @param  [type] $vagaId [description]
     */
    public function getVoluntariarse($vagaId) 
    {
        $User = Auth::user();
        $Candidato = $User->perfil;
        $vaga = Vaga::findOrFail($vagaId);

        //Se ja nao for voluntario, tornar-se voluntario
        if (!$vaga->voluntarios->find($Candidato->id)) {
            $vaga->voluntarios()->save($Candidato);
            $vaga->push();
            //Traz o responsável que será exibido como agradecendo pela vaga
            $Responsavel = $vaga->responsavel;

            //Envio de email para o responsável avisando e para o candidato agradecendo
            Mail::send('emails.obrigadocandidato', ['user' => Auth::user(),'vaga' => $vaga], function ($message) use ($User) {
                $message->to($User->email, $User->username)->subject('Olá, tudo bem?');
                $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
            });  
/*            Mail::send('emails.avisacontatoong', ['user' => Auth::user()], function ($message) use ($User) {
                $message->to($User->email, $User->username)->subject('Teste Email!');
                $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
            });  
 */
        }
        $voluntarios = $vaga->voluntarios;
        return view('vaga.show', compact('vaga', 'voluntarios', 'Candidato', 'Responsavel'));
    }


    /**
     * Remove o Perfil se o Perfil ja for voluntario na Vaga de $vagaId,
     * @param  [type] $id      [description]
     * @param  [type] $vagaId [description]
     */
    public function getUnvoluntariarse($vagaId) 
    {
        $User = Auth::user();
        $Candidato = $User->perfil;
        $vaga = Vaga::findOrFail($vagaId);

        //Se ja for voluntario, unsubscribe 
        if ($vaga->voluntarios->find($Candidato->id)) {
            $vaga->voluntarios()->detach($Candidato->id);
            $vaga->push();
        }
        $voluntarios = $vaga->voluntarios;
        return view('vaga.show', compact('vaga', 'voluntarios', 'Candidato'));
    }


}
