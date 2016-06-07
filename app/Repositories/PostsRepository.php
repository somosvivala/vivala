<?php namespace App\Repositories;

use App\Post;

/**
 * Classe para centralizar metodos referentes aos Posts
 */
class PostsRepository
{
    /**
     * Metodo para criar o post de boas vindas
     * retorna uma instancia de Post ainda nao persistida ja com as informacoes do
     * post de boas bindas
     *
     * @param $user - Instancia do usuario autor do post
     */
    public function getPostBemVindo(User $user)
    {
        $novoPost = new Post();

        //No caso das experiencias, possivelmente nao teremos genero. checar se realmente precisamos desse tratamento
        if($user->genero == 'fb.female' || $user->genero == 'feminino') {
            $welcome = "Bem vinda!";
        } else {
            $welcome = "Bem vindo(a)!";
        }

        $novoPost->descricao = "<h1><i class='fa fa-star'></i></h1>".$user->perfil->apelido." se juntou à Vivalá. ".$welcome;
        $novoPost->tipo_post = 'acontecimento';
        $novoPost->relevancia = 199;
        $novoPost->relevancia_rate = 10;

        return $novoPost;
    }

}
