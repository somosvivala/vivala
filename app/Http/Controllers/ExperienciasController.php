<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Agent;
use Auth;

use App\Experiencia;

class ExperienciasController extends Controller {

    //propriedade que guarda uma instancia de
    //ExperienciasRepository, contendo a logica interna
    private $ExperienciasRepository;

    /**
     * Construtor com dependencia do ExperienciasRepository
     */
    public function __construct(ExperienciasRepositoryInterface $repository)
    {
        $this->ExperienciasRepository = $repository;
    }

    /**
     * Exibe lista de experiencias
     *
     * @return view
     */
    public function index()
    {
        $experiencias = $this->ExperienciasRepository->getAll();

        if(!Agent::isDesktop()){
            return view("experiencias.desktop.listaexperiencias", compact("experiencias") );
        } else {
            return view("experiencias.listaexperiencias", compact("experiencias") );
        }
    }

    /*
     * Exibe detalhes da experiencia
     *
     * @return view
     */
    public function show($id)
    {
        $Experiencia = $this->ExperienciasRepository->findOrFail($id);

        if(!Agent::isDesktop()){
            return view("experiencias.desktop.detalheexperiencia", compact("Experiencia") );
        } else {
            return view("experiencias.detalheexperiencia", compact("Experiencia") );
        }
    }

    /*
     * Faz o checkout da experiencia
     *
     * @return view
     */
    public function getCheckout($id)
    {
        $Experiencia = $this->ExperienciasRepository->findOrFail($id);
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



}
