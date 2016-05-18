<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarFotoExperienciaRequest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Agent;
use Auth;
use App\Interfaces\ExperienciasRepositoryInterface;
use App\Experiencia;
use App\Http\Requests\CreateExperienciaRequest;
use App\Http\Requests\StoreExperienciaRequest;

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
        $this->middleware('auth', ['only' => [
            'getEditafoto',
            'getCheckout'
        ]]);
    }

    /**
     * Exibe lista de experiencias
     *
     * @return view
     */
    public function index()
    {
        $experiencias = $this->experienciasRepository->getAll();

        if(!Agent::isDesktop()){
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

        if(!Agent::isDesktop()){
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
        return view('experiencias._createform');
    }

    /**
     * Recebe a request para criacao de experiencias
     * @param $request - StoreExperienciaRequest
     */
    public function store(StoreExperienciaRequest $request)
    {
        return $this->experienciasRepository->createComCategorias($request->all());
    }


    /**
     * Faz o checkout da experiencia
     *
     * @return view
     */
    public function getCheckout($id)
    {
        $Experiencia = $this->experienciasRepository->findOrFail($id);
        // Testa se usuario está logado
        if (Auth::user()) {
            // Caso esteja logado exibe os métodos de pagamento
            if(!Agent::isDesktop()){
                return view("experiencias.desktop.checkout", compact("Experiencia") );
            } else {
                return view("experiencias.checkout", compact("Experiencia") );
            }
        } else {
            // Caso não esteja logado redireciona pra tela de login
            return redirect('/auth/login')->with(['redirectTo'=>'experiencias/checkout/'.$id]);;
        }

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
}
