<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentooRequest extends FormRequest
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
            'N_Obligatorio' => ['required', 'numeric'],
            'S_Descripcion' => ['string', 'max:255'],
            'S_ArchivoUrl' => ['string', 'url']
        ];
    }
}
