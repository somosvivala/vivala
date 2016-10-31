<?php namespace App\Services;

use App\User;
use App\Post;
use App\Perfil;
use App\PrettyUrl;
use Carbon\Carbon;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use App\Repositories\PostsRepository;
use App\Repositories\MailSenderRepository;


/**
 * Criando uma nova classe que implementa o RegistrarContract, para fazer um tratamento
 * de login diferente no caso das experiencias
 */
class ExperienciasRegistrar implements RegistrarContract
{
    private $emailRepository;
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

        /** Criando instancia de um Validator especificando suas regras */
        $validator = Validator::make($data, [
            'username' => 'required|string|max:60',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed'
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
        //tratando campo nome
        $nome = ucwords(strtolower($data['username']));

        $user = User::create([
            'username'  => $nome,
            'email'     => $data['email'],
            'password'  => bcrypt($data['password'])
        ]);

        $perfil = Perfil::create([
            'user_id'       => $user->id,
            'nome_completo' => $nome,
            'apelido'       => $nome
        ]);

        //Criando uma nova prettyURL para o Perfil e já persistindo ela no BD
        $perfil->prettyUrl()->save(PrettyUrl::getURLParaPerfil($nome));
        $perfil->push();

        //Usando da instancia de PostsRepository recebido no controller para
        //fazer o post de boas vindas
        $postBemVindo = $this->postRepository->getPostBemVindo($user);
        $perfil->posts()->save($postBemVindo);

        //Usando da instancia de MailSenderRepository recebido no controller para
        //enviar o email de boas vindas
        $this->emailRepository->enviaEmailBemVindo($user);

        //@todo criar evento/handlers para lidar com os comportamentos pós registro
        //e isolar esses disparos nos respectivos handlers
        return $user;
    }
}
