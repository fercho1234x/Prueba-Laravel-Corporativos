<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoCorporativoRequest extends FormRequest
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
            'D_FechaInicio' => ['required', 'date'],
            'D_FechaFin' => ['required', 'date'],
            'S_URLContrato' => ['string', 'max:255', 'url'],
            'corporativo_id' => ['required', 'exists:corporativos,id']
        ];
    }
}
