<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Agent;

class ExperienciasController extends Controller {

	/**
         * Exibe lista de experiencias
	 *
	 * @return view
	 */
	public function getIndex()
	{
            $exp = new \stdClass();
            $exp->id = 42;
            $exp->titulo = "Título da Experiência";
            $exp->descricao = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim mi ac ipsum consectetur, at tempus lacus mattis. Maecenas elementum varius felis nec finibus. ";
            $exp->foto = "/img/dummyvoos.jpg";
            $exp->preco = 36.75;

            $experiencias = [
                $exp,
                $exp,
                $exp
            ];

            if(Agent::isDesktop()){
		return view("experiencias.desktop.listaexperiencias", compact("experiencias") );
            } else {
		return view("experiencias.listaexperiencias", compact("experiencias") );
            }
	}

	/**
         * Exibe detalhes da experiencia
	 *
	 * @return view
	 */
	public function getShow($id)
	{
            $Experiencia = new \stdClass();
            $Experiencia->id = 42;
            $Experiencia->titulo = "Título da Experiência";
            $Experiencia->descricao = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum dignissim mi ac ipsum consectetur, at tempus lacus mattis. Maecenas elementum varius felis nec finibus. ";
            $Experiencia->foto = "/img/dummyvoos.jpg";
            $Experiencia->preco = 36.75;

            if(Agent::isDesktop()){
		return view("experiencias.desktop.detalheexperiencia", compact("Experiencia") );
            } else {
		return view("experiencias.detalheexperiencia", compact("Experiencia") );
            }
        }
}
