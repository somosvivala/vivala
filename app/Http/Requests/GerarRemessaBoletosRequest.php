<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class GerarRemessaBoletosRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
  {
    //Se for admin pode
		return Auth::user() ? Auth::user()->isAdmin() : false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}

}
