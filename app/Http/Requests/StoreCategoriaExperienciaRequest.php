<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class StoreCategoriaExperienciaRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'string|required|unique:categoria_experiencias',
            'icone' => 'string|required'
        ];
    }

}
