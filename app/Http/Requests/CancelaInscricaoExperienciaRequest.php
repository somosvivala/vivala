<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class CancelaInscricaoExperienciaRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //checando se o usuario logado pode fazer essa request
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
            'id_inscricao' => 'required|exists:inscricao_experiencias,id',
        ];
    }

}
