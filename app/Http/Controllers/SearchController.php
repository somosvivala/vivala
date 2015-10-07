<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Http\Request;

use App\Estado;

class SearchController extends Controller {


    //Metodo para pegar cidades de um estado
    public function getCidadesestado($idEstado)
    {
        $cidades = Estado::findOrFail($idEstado)->cidades;
        return Response::json(array('error' => 0, 'cidades' => $cidades));
    }
}
