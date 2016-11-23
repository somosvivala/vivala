<?php namespace App\Services;

use App\User;
use App\Post;
use App\Perfil;
use App\PrettyUrl;
use Carbon\Carbon;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use App\Repositories\MailSenderRepository;
use App\Repositories\PostsRepository;

class Registrar implements RegistrarContract
{

    /* instancia do repositorio de emails para enviar o email de welcome */
    private $emailRepository;

    /* instancia do repositorio de posts para criar o post de bem vindo */
    private $postRepository;

    /**
     * Constructor recebendo instancias dos repositorios que ele necessita
     *
     * @param $emailRepository - Instancia de MailSenderRepository
     * @param $postsRepository - Instancia de PostsRepository
     */
    function __construct(MailSenderRepository $emailRepository, PostsRepository $postsRepository)
    {
        $this->emailRepository = $emailRepository;
        $this->postRepository = $postsRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        /* Criando uma instancia de validator com as regras da request */
        $validator = Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        /* Usando metodo setAttributeNames do Validator para mostrar 'nice names' nas mensagens de erro */
        $validator->setAttributeNames([
            'username' => 'nome',
            'email' => 'email',
            'password' => 'senha'
        ]);

        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        $nome = ucwords(strtolower($data['username']));
        $sobrenome = ucwords(strtolower($data['username_last']));

        //Criando perfil, usando dos atributos dentro de fillable[]
        $user = User::create([
            'username' => $nome,
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        /* Criando perfil e salvando as informacoes do cadastro */
        $perfil = new Perfil;
        $perfil->user_id = $user->id;
        $perfil->nome_completo = $nome .' '. $sobrenome;
        $perfil->apelido = $nome;
        $perfil->save();

        /* Criando uma prettyUrl para o novo usuario (username_currentTimestamp) */
        $prettyUrl = new PrettyUrl();
        $prettyUrl->url = str_replace(" ", "", $user->username) . '_' . Carbon::now()->getTimestamp();
        $prettyUrl->tipo = 'usuario';
        $perfil->prettyUrl()->save($prettyUrl);

        /* Usando do PostsRepository para fazer o post de boas vindas */
        $postBemVindo = $this->postRepository->getPostBemVindo($user);
        $perfil->posts()->save($postBemVindo);

        /* Usando do MailSenderRepository para enviar o email de boas vindas */
        $this->emailRepository->enviaEmailBemVindo($user);

        return $user;
    }
}
