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
            if(Agent::isDesktop()){
            
                echo "Desktop";
            } else {
            
                echo "mobile";
            }
	}

}
