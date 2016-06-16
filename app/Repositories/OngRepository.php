<?php namespace App\Repositories;

use App\Ong;

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

}
