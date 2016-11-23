<?php namespace App\Repositories;

use App\Ong;
use App\Vaga;

/**
 * Classe para centralizar metodos referentes as Ongs
 */
class OngRepository
{
    /**
     * Metodo para fornecer ongs no formato necessario para campos select
     *
     * @param $view - Uma instancia da view a ser exibida, fornecida
     * pelo view composer do laravel
     */
    public function injectOngsParaSelect($view)
    {
        $ongs = Ong::all();
        $ongsArray = array(null => '');
        foreach ($ongs as $ong)
        {
            $ongsArray[$ong->id] = $ong->nome;
        }
        $ongs = $ongsArray;

        return $view->with('ongs', $ongs);
    }

    /**
     * Metodo para fornecer um array com todas as rotas que são do Instituto e devem ter o logo correto
     *
     * @param $view - Uma instancia da view a ser exibida, fornecida * pelo view composer do laravel
     */
    public function injectArrayRotasInstituto($view)
    {
        /* array com todas as pretty urls  e urls de edicao das ongs */
        $arrayRotasInstituto = Ong::all()->lists('url');
        $arrayRotasInstituto = array_merge($arrayRotasInstituto, Ong::all()->lists('urlEdicao'));

        /* lista com todas as  urls das vagas */
        $arrayRotasInstituto = array_merge($arrayRotasInstituto, Vaga::all()->lists('url'));
        $arrayRotasInstituto = array_merge($arrayRotasInstituto, Vaga::all()->lists('urlEdicao'));

        /* Outras urls */
        $arrayRotasInstituto[] = url('/instituto');
        $arrayRotasInstituto[] = url('/ongs');
        $arrayRotasInstituto[] = url('/ong/create');
        $arrayRotasInstituto[] = url('/vagas');
        $arrayRotasInstituto[] = url('/busca/filtrarongs');
        $arrayRotasInstituto[] = url('busca/filtrarvagas');

        return $view->with('arrayRotasInstituto', $arrayRotasInstituto);
    }
    

}
