<?php namespace App\Http\Controllers;

use Agent;
use Auth;
use App\Experiencia;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\EditarFotoExperienciaRequest;
use App\Http\Requests\EditExperienciaRequest;
use App\Http\Requests\UpdateExperienciaRequest;
use App\Http\Requests\CreateExperienciaRequest;
use App\Http\Requests\StoreExperienciaRequest;
use App\Http\Requests\CreateInformacaoExperienciaRequest;
use App\Http\Requests\DeleteInformacaoExperienciaRequest;
use App\Http\Requests\DestroyExperienciaRequest;
use App\Http\Requests\CreateDataOcorrenciaExperienciaRequest;
use App\Http\Requests\DeleteDataOcorrenciaExperienciaRequest;
use App\Http\Requests\GerarBoletoInscricaoExperienciaRequest;
use App\Http\Requests\NovaInscricaoExperienciaRequest;
use App\Interfaces\ExperienciasRepositoryInterface;
use App\Events\NovaInscricaoExperiencia;
use App\Events\NovosDadosUsuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmaInscricaoExperienciaRequest;
use App\Http\Requests\DesativarExperienciaRequest;
use App\Http\Requests\PublicarExperienciaRequest;
use App\Http\Requests\CancelaInscricaoExperienciaRequest;

class ExperienciasController extends Controller
{

    //Como vamos lidar com experiencias, usamos do repositorio de experiencias
    private $experienciasRepository;


    /**
     * Construtor com dependencia do experienciasRepository
     */
    public function __construct(ExperienciasRepositoryInterface $repository)
    {
        //recebendo uma instancia do repositorio de experiecias
        $this->experienciasRepository = $repository;
        $this->middleware('auth.mobile', ['only' => [
            'getEditafoto',
            'getCheckout',
            'create',
            'store',
            'edit',
            'upload',
            'destroy'
        ]]);

        //se acessar /experiencias do desktop precisa estar logado
        $this->middleware('auth.only.desktop', ['only' => [
            'index',
            'show'
        ]]);
    }


    /**
     * Exibe lista de experiencias
     *
     * @return view
     */
    public function index()
    {
        $experiencias = $this->experienciasRepository->getExperienciasAtivas();

        if(Agent::isDesktop()){
            return view("experiencias.desktop.listaexperiencias", compact("experiencias") );
        } else {
            return view("experiencias.listaexperiencias", compact("experiencias") );
        }
    }


    /**
      * Exibe detalhes da experiencia
     *
     * @return view
     */
    public function show($id)
    {
        $Experiencia = $this->experienciasRepository->findOrFail($id);

        //Se a experiencia em questao nao estiver ativa
        if (!$Experiencia->isAtiva) {
            //e o usuario nao for admin (caso queria ver como ficou a experiencia em analise)
            $podeAcessar = Auth::user() ? Auth::user()->isAdmin() : false;
            if ($podeAcessar)
                return redirect('/experiencias');
        }

        if(Agent::isDesktop()){
            return view("experiencias.desktop.detalheexperiencia", compact("Experiencia") );
        } else {
            return view("experiencias.detalheexperiencia", compact("Experiencia") );
        }
    }


    /**
     * Serve a view de criacao de uma experiencia
     */
    public function create(CreateExperienciaRequest $request)
    {
        return view('experiencias.create');
    }


    /**
     * Recebe a request para criacao de experiencias
     * @param $request - StoreExperienciaRequest
     */
    public function store(StoreExperienciaRequest $request)
    {
        $exp = $this->experienciasRepository->create($request->all());
        return redirect('/experiencias/'.$exp->id);
    }


    /**
     * Metodo para servir a view de edicao de uma experiencia
     */
    public function edit(EditExperienciaRequest $request, $experienciaId)
    {
        $experiencia = $this->experienciasRepository->findOrFail($experienciaId);
        return view('experiencias.edit')->with('experiencia', $experiencia);
    }


    /**
     * Metodo para fazer o update de uma experiencia
     *
     * @param $request - Objeto contendo as informacoes da request ja validadas
     * @param $experienciaId - Id da experiencia que sera updated
     */
    public function update(UpdateExperienciaRequest $request, $experienciaId)
    {
        $this->experienciasRepository->update($request->all(), $experienciaId);
        return redirect('/experiencias/'.$experienciaId);
    }


    /**
     * Faz o checkout da experiencia
     *
     * @return view
     */
    public function getCheckout(Request $request, $id)
    {
        $Experiencia = $this->experienciasRepository->findOrFail($id);

        //Se a experiencia em questao nao estiver ativa
        if (!$Experiencia->isAtiva) {
            //e o usuario nao for admin (caso queria ver como ficou a experiencia em analise)
            $podeAcessar = Auth::user() ? Auth::user()->isAdmin() : false;
            if ($podeAcessar)
                return redirect('/experiencias');
        }

        //Checando se o usuario atual ja esta inscrito , se nao estiver entao criar nova inscricao
        $Inscricao = $Experiencia->getInscricaoUsuario(Auth::user());
        if (!$Inscricao) {
            $Inscricao = $this->experienciasRepository->createInscricaoExperiencia($Experiencia->id, Auth::user()->perfil->id);
            event(new NovaInscricaoExperiencia($Inscricao);
            return redirect('/experiencias');
        }

        if(Agent::isDesktop()) {
            return view("experiencias.desktop.checkout", compact("Experiencia", "Inscricao") );
        } else {
            return view("experiencias.checkout", compact("Experiencia", "Inscricao") );
        }

    }

    /**
     * Faz o checkout da experiencia
     *
     * @return view
     */
    public function postCreateInscricaoExperiencia(NovaInscricaoExperienciaRequest $request)
    {
        $Experiencia = $this->experienciasRepository->findOrFail($request->id_experiencia);

        //Se a experiencia em questao nao estiver ativa
        if (!$Experiencia->isAtiva) {
            //e o usuario nao for admin (caso queria ver como ficou a experiencia em analise)
            $podeAcessar = Auth::user() ? Auth::user()->isAdmin() : false;
            if (!$podeAcessar)
                return redirect('/experiencias');
        }

        $data_inscricao = $request->data_inscricao;
        $Inscricao = $this->experienciasRepository->createInscricaoExperiencia($Experiencia->id, Auth::user()->perfil->id, $data_inscricao );
        event(new NovaInscricaoExperiencia($Inscricao));

        return ['success' => true];

    }

    /**
     * Metodo para servir a view para editar a fotoCapa da Experiencia
     *
     * @param $request - Usando da FormRequestValidation
     * @param $id - ID da experiencia no BD
     */
    public function getEditafoto(EditarFotoExperienciaRequest $request, $id)
    {
        $experiencia = $this->experienciasRepository->findOrFail($id);
        $foto = $experiencia->fotoCapa;
        return view('experiencias._editafotoform', compact('experiencia', 'foto'));

    }


    /**
     * Rota para criar novas InformacaoExperiencia
     *
     * @param $request - instancia de CreateInformacaoExperienciaRequest
     */
    public function getAddinformacaoextra(CreateInformacaoExperienciaRequest $request)
    {
        $informacao = $this->experienciasRepository->createInformacaoExtra($request->all());
        return ['html' => view('experiencias._form_extra_item')->with('informacao', $informacao)->render() ];
    }

    /**
     * Rota para deletar InformacaoExperiencia
     *
     * @param $request - instancia de DeleteInformacaoExperienciaRequest
     */
    public function putDeleteinformacaoextra(DeleteInformacaoExperienciaRequest $request)
    {
        return ['result' => $this->experienciasRepository->deleteInformacaoExtra($request->all()) ];
    }

    /**
     * Metodo para deletar uma experiencia
     */
    public function destroy(DestroyExperienciaRequest $request, $id)
    {
        $this->experienciasRepository->delete($id);
    }

    /**
     * Rota para servir a view de conheca vivala
     */
    public function getConhecaVivala()
    {
        return view('conhecadeslogado');
    }


    /**
     * Rota para criar uma nova DataOcorrencia para uma experiencia
     *
     * @param $request - instancia de CreateDataOcorrenciaExperienciaRequest
     */
    public function getAddDataOcorrencia(CreateDataOcorrenciaExperienciaRequest $request)
    {
        $dataOcorrencia = $this->experienciasRepository->createDataOcorrencia($request->all());
        return ['html' => view('experiencias._form_data_ocorrencia')->with('dataOcorrencia', $dataOcorrencia)->render() ];
    }

    /**
     * Rota para deletar uma DataOcorrenciaExperiencia
     *
     * @param $request - instancia de DeleteDataOcorrenciaExperienciaRequest
     */
    public function putDeleteDataOcorrencia(DeleteDataOcorrenciaExperienciaRequest $request)
    {
        return ['result' => $this->experienciasRepository->deleteDataOcorrencia($request->all()) ];
    }


    /**
     * Rota para confirmar uma inscricao de experiencia
     */
    public function postConfirmaInscricao(ConfirmaInscricaoExperienciaRequest $request)
    {
        return ['result' => $this->experienciasRepository->confirmaInscricaoExperiencia($request)];
    }

    /**
     * Rota para cancelar uma inscricao de experiencia
     */
    public function postCancelaInscricao(CancelaInscricaoExperienciaRequest $request)
    {
        return ['result' => $this->experienciasRepository->cancelaInscricaoExperiencia($request)];
    }


    /**
     * Rota para publicar uma experiencia (passa a aparecer na listagem)
     */
    public function postPublicarExperiencia(PublicarExperienciaRequest $request)
    {
        return ['result' => $this->experienciasRepository->publicarExperiencia($request)];
    }

    /**
     * Rota para desativar uma experiencia (Remove da listagem)
     */
    public function postDesativarExperiencia(DesativarExperienciaRequest $request)
    {
        return ['result' => $this->experienciasRepository->desativarExperiencia($request)];
    }

    /**
     * Rota para gerar um boleto para uma inscricao
     */
    public function postGerarBoleto(GerarBoletoInscricaoExperienciaRequest $request)
    {

        $experiencia = $this->experienciasRepository->findOrFail($request->get('experiencia_id'));

        //Disparando o evento para atualizar as novas informacoes do usuario
        event ( new NovosDadosUsuario(Auth::user(), $request->all()) );

        //gerando boleto
        $boleto = $this->experienciasRepository->gerarBoleto($experiencia, Auth::user());

        if ($boleto && $boleto->status == 'gerado') {
            return ['linkboleto' => ($boleto->linkSegundaVia)];
        }

        //Se chegou aqui deu erro
        return ['error' => '??'];
    }

}
