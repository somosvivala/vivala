<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Request;

use App\Estado;

use App\CategoriaOng;
use App\Ong;
use App\Cidade;

use Illuminate\Database\Eloquent\Collection;

class SearchController extends Controller {


    //Metodo para pegar cidades de um estado
    public function getCidadesestado($idEstado)
    {
        $cidades = Estado::findOrFail($idEstado)->cidades;
        return Response::json(array('error' => 0, 'cidades' => $cidades));
    }
    


    /**
     * Metodo para filtrar Ongs por POST,
     * @param categoriaOng  -> id da categoria a ser usada no filtro
     * @param nome          -> nome a ser usado no filtro
     * @param cidade_id      -> id da cidade a ser usado no filtro
     */
    public function postFiltrarongs()
    {
        $categoriaOng = Request::get('categoriaOng');
        $nome = Request::get('nome');
        $cidade_id = Request::get('cidade_id');
        $ongs = new Collection();

        //Filtrando resultados pelas categorias
        if ($categoriaOng && $categoriaOng != "null") {
            $ongsByCategoria = CategoriaOng::findOrFail($categoriaOng)->ongs;
            $ongs = $ongs->merge($ongsByCategoria);            
        } 

        //Fitrando resultados com base no nome
        if ($nome) {
            $ongsByNome = Ong::where('nome', 'ILIKE', "%".$nome."%")->get();         
            
            //Se ja tiver filtrado por categoria, entao interseccionar os 
            //resultados para maior relevancia
            if (count($ongs)) {
                $ongs = $ongs->intersect($ongsByNome);            
            
            } else {    
                $ongs = $ongs->merge($ongsByNome);            
            }
        }

        //Filtrando resultados por Cidade
        if ($cidade_id) {
           $ongsByCidade = Cidade::findOrFail($cidade_id)->ongs;

            //Se ja tiver filtrado, entao interseccionar os 
            //resultados para maior relevancia
            if (count($ongs)) {
                $ongs = $ongs->intersect($ongsByCidade);            
            
            } else {    
                $ongs = $ongs->merge($ongsByCidade);            
            }
        }

        $categorias = CategoriaOng::all();
        $cidades = Ong::getCidadesComOngs();
        
        $cidadesArray = array(0 => 'Selecione uma Cidade');
        foreach ($cidades as $cidade)
        {
            $cidadesArray[$cidade->id] = $cidade->nome;
        }
        $cidades = $cidadesArray;
    
        return view('cuidar.ongs', compact('ongs','categorias', 'cidades'));
    }
    

    /**
     * Metodo para filtrar Vagas por POST,
     * @param categoriaOng  -> id da categoria a ser usada no filtro
     * @param nome          -> nome a ser usado no filtro
     * @param cidade_id      -> id da cidade a ser usado no filtro
     */
    public function postFiltrarvagas()
    {
        //   $causas = Vaga::all(); //ta quebrando
        $causas = Ong::all();

        $categorias = CategoriaOng::all();
        $cidades = Ong::getCidadesComOngs();
        
        $cidadesArray = array(0 => 'Selecione uma Cidade');
        foreach ($cidades as $cidade)
        {
            $cidadesArray[$cidade->id] = $cidade->nome;
        }
        $cidades = $cidadesArray;
    
        return view('cuidar.vagas', compact('causas','categorias', 'cidades'));
    }
    

}
