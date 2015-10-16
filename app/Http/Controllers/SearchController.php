<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Request;

use App\Estado;

use App\CategoriaOng;
use App\CategoriaVaga;
use App\Ong;
use App\Vaga;
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
        $categoriaOng = Request::get('filtro_categoria');
        $nome = Request::get('nome');
        $cidade_id = Request::get('filtro_cidade');
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

        $cidades = Ong::getCidadesComOngs();
        
        $cidadesArray = array(0 => 'Cidade');
        foreach ($cidades as $cidade)
        {
            $cidadesArray[$cidade->id] = $cidade->nome;
        }
        $cidades = $cidadesArray;

        $categorias = Ong::getCategoriasComOngs();
        $categoriasArray = array(0 => 'Categoria');
        foreach ($categorias as $categoria)
        {
            $categoriasArray[$categoria->id] = $categoria->nomeTraduzido;
        }
        $categorias = $categoriasArray;

        //Se nao vier nenhum filtro, mostrar todas as ongs
        if (!$nome && (!$categoriaOng || $categoriaOng == "null") && !$cidade_id) {
            $ongs = Ong::all();
        }

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

        $categoriaVaga = Request::get('filtro_categoria');
        $cidade_id     = Request::get('filtro_cidade');
        $filtro_ong    = Request::get('filtro_ong');

        $categorias = Vaga::getCategoriasComVagas();
        $cidades = Vaga::getCidadesComVagas();
        $ongs = Vaga::getOngsComVagas(); 
        $causas = new Collection();
        
        //Montando array de ongs para select
        $ongsArray = array(null => 'Projeto');
        foreach ($ongs as $ong)
        {
            $ongsArray[$ong->id] = $ong->nome;
        }
        $ongs = $ongsArray;
 

        //Montando array de cidades para select
        $cidadesArray = array(null => 'Cidade'); 
        foreach ($cidades as $cidade)
        {
            $cidadesArray[$cidade->id] = $cidade->nome;
        }
        $cidades = $cidadesArray;

        //Montando array de categorias para select
        $categoriasArray = array(null => 'Categoria'); 
        foreach ($categorias as $categoria)
        {
            $categoriasArray[$categoria->id] = $categoria->nomeTraduzido;
        }
        $categorias = $categoriasArray;

        
        //Filtrando resultados pelas categorias
        if ($categoriaVaga && $categoriaVaga != "null") {
            $vagasByCategoria = CategoriaVaga::findOrFail($categoriaVaga)->vagas;
            $causas = $causas->merge($vagasByCategoria);            
        }

        //Filtrando resultados por Cidade
        if ($cidade_id) {
           $vagasByCidade = Cidade::findOrFail($cidade_id)->vagas;
           
            //Se ja tiver filtrado, entao interseccionar os 
            //resultados para maior relevancia
            if (count($causas)) {
                $causas = $causas->intersect($vagasByCidade);            
            
            } else {    
                $causas = $causas->merge($vagasByCidade);            
            }
        }

        if ($filtro_ong) {
            $causasByOng = Ong::findOrFail($filtro_ong)->vagas;

            if (count($causas)) {
                $causas = $causas->intersect($causasByOng);
            } else {
                $causas =  $causas->merge($causasByOng);
            }
        }


        if (!$cidade_id && (!$categoriaVaga || $categoriaVaga == "null") && !$filtro_ong ) {
            $causas = Vaga::all(); 
        }

        return view('cuidar.vagas', compact('causas','categorias', 'cidades', 'ongs'));
        
    }
    

}
