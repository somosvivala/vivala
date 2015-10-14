<?php namespace App\Observers;

class GenericObserver {
    public function deleting ($model) {
        if (count($model->relacoesPolimorficasDependentes)) {
            foreach ($model->relacoesPolimorficasDependentes as $relacao) {
                echo 'deletando ->  ' . $relacao . '\r';

                $objRelacionado = $model->{$relacao}; 

                switch (get_class($objRelacionado)) {
                    //'Para cada post de Ong...'
                case "Illuminate\\Database\\Eloquent\\Collection":

                    foreach ($objRelacionado as $objRelacao) {
                        echo 'deletando Inner ->  ' . $objRelacao . '\r';
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


