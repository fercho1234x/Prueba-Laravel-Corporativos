<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios', 'email')->ignore($this->user->id)],
            'S_Nombre' => ['string', 'max:45'],
            'S_Apellidos' => ['string', 'max:45'],
            'S_FotoPerfilUrl' => ['string', 'max:255'],
            'S_Activo' => ['required', 'in:1,0'],
            'password' => ['required', 'string', 'min:5']
        ];
    }
}
