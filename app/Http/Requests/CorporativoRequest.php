<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorporativoRequest extends FormRequest
{
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
        return [
            'S_NombreCorto' => ['required', 'string', 'max:45'],
            'S_NombreCompleto' => ['required', 'string', 'max:75'],
            'S_LogoURL' => ['string', 'max:255'],
            'S_DBName' => ['required', 'string', 'max:45'],
            'S_DBUsuario' => ['required', 'string', 'max:45'],
            'S_DBPassword' => ['required', 'string', 'max:150'],
            'S_SystemUrl' => ['required', 'string', 'max:255'],
            'S_Activo' => ['required', 'in:1,0'],
            'D_FechaIncorporacion' => ['required', 'date'],
            'usuario_id' => ['required', 'exists:usuarios,id'],
            'FK_Asignado_id' => ['required', 'exists:usuarios,id']
//
        ];
    }
}
