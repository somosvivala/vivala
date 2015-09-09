<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;
use App\PrettyUrl;
use Auth;

class EditarAlbumRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		Validator::extend('pretty_url', function($attribute, $value, $parameters)
		{
			$prettyUrl = PrettyUrl::where("url", $value)->get()->first();
			$isMyUrl = $prettyUrl ? ($prettyUrl->prettyurlable == Auth::user()->entidadeAtiva) : true;
		    return ($prettyUrl ? $isMyUrl : true);
		});

		return [
			"foto_upload"    	=> 'mimes:png,jpg',
			"nome" 				=> 'date_format:"d/m/Y"',
			"descricao" 		=> 'alpha|min:3'
		];
	}

}
							