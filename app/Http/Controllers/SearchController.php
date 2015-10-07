<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Estado;

class SearchController extends Controller {

    public function getCidadesestado($idEstado)
    {
        return Estado::findOrFail($idEstado)->cidades;
    }
}
