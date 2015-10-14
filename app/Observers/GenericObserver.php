<?php namespace App\Observers;

use Auth;
use Session;

class GenericObserver {
    public function deleting ($model) {

        switch (get_class($model)) {
            case "App\\Ong":
                Session::put('entidadeAtiva_id', Auth::user()->perfil->id);
                Session::put('entidadeAtiva_tipo', 'perfil');
                break;

            default:
                break;
        }


        if (count($model->relacoesPolimorficasDependentes)) {
            foreach ($model->relacoesPolimorficasDependentes as $relacao) {

                $objRelacionado = $model->{$relacao}; 

                switch (get_class($objRelacionado)) {
                    //'Para cada post de Ong...'
                case "Illuminate\\Database\\Eloquent\\Collection":

                    foreach ($objRelacionado as $objRelacao) {
                        $objRelacao->delete();
                    }        
                    break;

                default:
                    if ($objRelacionado) $objRelacionado->delete();  
                    break;
                }
            }
        }
    }
}


