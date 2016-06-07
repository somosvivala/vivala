<?php namespace App\Services;

use App\User;
use App\Post;
use App\Perfil;
use App\PrettyUrl;
use Carbon\Carbon;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Mail;


/**
 * Criando uma nova classe que implementa o RegistrarContract, para fazer um tratamento
 * de login diferente no caso das experiencias
 */
class ExperienciasRegistrar implements RegistrarContract
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
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

        // Envia um email de boas vindas
        Mail::send('emails.bemvindo', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Bem vindo à Vivalá');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });

        // Faz um post de criação de perfil numerado caso seja < 300
        // e não numerado (só com o welcome) caso seja > 300
        if($user->genero == 'fb.female' || $user->genero == 'feminino')
            $welcome = "Bem vinda!";
        else
            $welcome = "Bem vindo!";

        $novoPost = new Post();

        if($perfil->id <= 300)
            $novoPost->descricao = "<h1><i class='fa fa-star'></i></h1>".$perfil->apelido." é a ".$perfil->id."ª pessoa a se juntar à Vivalá. ".$welcome;
        else
            $novoPost->descricao = "<h1><i class='fa fa-star'></i></h1>".$perfil->apelido." se juntou à Vivalá. ".$welcome;

        $novoPost->tipo_post = 'acontecimento';
        $novoPost->relevancia = 999;
        $novoPost->relevancia_rate = 10;

        //Salvando novoPost para entidadeAtiva
        $perfil->posts()->save($novoPost);

        return $user;
    }

}
