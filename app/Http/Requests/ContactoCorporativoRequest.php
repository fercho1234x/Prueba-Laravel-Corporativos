<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoCorporativoRequest extends FormRequest
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
            'S_Nombre' => ['required', 'string', 'max:45'],
            'S_Puesto' => ['required', 'string', 'max:45'],
            'S_Comentarios' => ['string', 'max:255'],
            'S_TelefonoFijo' => ['string', 'max:12'],
            'S_TelefonoMovil' => ['string', 'max:12'],
            'S_Email' => ['required', 'string', 'email', 'max:45'],
            'corporativo_id' => ['required', 'exists:corporativos,id']
        ];
    }
}
