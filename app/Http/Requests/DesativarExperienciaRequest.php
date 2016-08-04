<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class DesativarExperienciaRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //apenas admins podem fazer essa request
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
            'id' => 'required|exists:experiencias,id'
        ];
    }

}
