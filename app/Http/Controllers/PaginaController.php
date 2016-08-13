<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\CategoriaEmpresa;
use App\CategoriaOng;
use App\Post;
use Session;
use Mail;

use App\Http\Requests\ContatoRequest;
use App\Http\Requests\FeedbackRequest;

use App\Repositories\MailSenderRepository;

class PaginaController extends Controller {

    /**
     * Constructor recebendo instancias dos repositorios que ele necessita
     *
     * @param $emailRepository - Instancia de MailSenderRepository
     */
    public function __construct(MailSenderRepository $emailRepository) {
        // Use middleware only on some functions
        $this->middleware('auth', ['except' => [
            'getTermosecondicoes',
            'getAssinaturapg',
            'getAssinaturadan',
            'getAssinaturaraissa',
            'getAssinaturadib',
            'getAssinaturababi' ]
        ]);

        $this->emailRepository = $emailRepository;
    }

    /**
     * Retorna ate 3 paginas dentre as Ongs/Empresas de um Usuario
     * @return Array<Ong|Empresa>
     */
    public function getMenu($view = null)
    {
        //Se estiver logado
        if ( Auth::user() ) {
            $paginas = Auth::user()->paginas->take(3);
        } else {
            $paginas = array();
        }

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
                $entidadeExiste = ($ong && Auth::user()->ongs->find($id)) ? true : false;
                break;

            case 'empresa':
                # Retorna a empresa na lista de empresas do usuario, ou o perfil
                $empresa = Empresa::find($entidadeAtiva_id);
                $entidadeExiste = ($empresa && Auth::user()->empresas->find($id)) ? true : false;
                break;

            case 'perfil':
                # Retorna a empresa na lista de empresas do usuario, ou o perfil
                $perfil = Perfil::find($entidadeAtiva_id);
                $entidadeExiste = ($perfil && Auth::user()->perfil->id == $id) ? true : false;
                break;

            default:
                break;
            }

            if ($entidadeExiste) {
                Session::put('entidadeAtiva_id', $entidadeAtiva_id);
                Session::put('entidadeAtiva_tipo', $entidadeAtiva_tipo);
            }

            return redirect('conectar');
        }
    }

    /**
     * Retorna a blade da pagina de Contato
     */
    public function getContato()
    {
        return view('paginas.contato');
    }

    /**
     * Retorna a pagina Manifesto
     */
    public function getNossomanifesto()
    {
        return view('paginas.nossomanifesto');
    }

    /**
     * Retorna a blade da pagina de ction getOquefazemos
     */
    public function getOquefazemos()
    {
        return view('paginas.oquefazemos');
    }

    /**
     * Retorna a blade da pagina de ction getParceiros
     */
    public function getParceiros()
    {
        return view('paginas.parceiros');
    }

    /**
     * Retorna a blade da pagina de Politicaprivacidade
     */
    public function getPoliticadeprivacidade()
    {
        return view('paginas.politicadeprivacidade');
    }

    /**
     * Retorna a blade da pagina de Quemsomos
     */
    public function getQuemsomos()
    {
        return view('paginas.quemsomos');
    }

    /**
     * Retorna a blade da pagina de Termosecondicoes
     */
    public function getTermosecondicoes()
    {
        if (Auth::user()) {
            return view('paginas.termosecondicoes');
        } else {
            return view('paginas._termosecondicoes');
        }
    }

    /**
     * Retorna a blade da pagina de Porque Cuidar
     */
    public function getPorquecuidar()
    {
        return view('paginas.porquecuidar');
    }

    public function getUltimasnoticias()
    {
        $posts = Post::getUltimos()->keyBy('id');
        $posts_total = count($posts);
        $posts = $posts->slice(0, env('QUANTIDADE_FEED_POST'), true);
        return view('home', compact('posts', 'pagina'));
    }

    /**
    * Recebe dados do usuário logado e envia um email teste com alguns dados pra conta SANDBOX
    * @param emailRepository instância usada com método enviaEmailTeste
    */
    public function getTesteEnviaEmail()
    {
        $user = Auth::user();

        // Disparando evento para avisando que temos uma novo email de feedback
        $this->emailRepository->enviaEmailTeste($user);

        return 'Testando?';
    }

    /**
     * Recebe a request do form de contato e dispara o mail
     * @param emailRepository instância usada com método enviaEmailFormularioContato
     */
    public function postContato(ContatoRequest $request)
    {
        $request->user_id = Auth::user()->id;
        // Montando o Objeto formado pelo request de ContatoRequest + user_id
        $FormContato = $request;

        // Disparando evento para avisando que temos uma novo email de contato
        $this->emailRepository->enviaEmailFormularioContato($FormContato);
    }

    /**
     * Recebe a request do form de feedback e dispara o mail
     * @param emailRepository instância usada com método enviaEmailFormularioFeedback
     */
    public function postFeedback(FeedbackRequest $request)
    {
        $request->email = Auth::user()->email;
        $request->nome = (!empty(Auth::user()->username) ? Auth::user()->username : Auth::user()->perfil->apelido);
        // Montando o Objeto formado pelo request de ContatoRequest + user_email + user_nome
        $FormFeedback = $request;

        // Disparando evento para avisando que temos uma novo email de feedback
        $this->emailRepository->enviaEmailFormularioFeedback($FormFeedback);
    }


    public function getAssinaturadan()
    {
        return view('paginas.assinaturas.assinaturadan');
    }

    public function getAssinaturapg()
    {
        return view('paginas.assinaturas.assinaturapg');
    }

    public function getAssinaturaraissa()
    {
        return view('paginas.assinaturas.assinaturaraissa');
    }

    public function getAssinaturadib()
    {
        return view('paginas.assinaturas.assinaturadib');
    }

    public function getAssinaturababi()
    {
        return view('paginas.assinaturas.assinaturababi');
    }
}
