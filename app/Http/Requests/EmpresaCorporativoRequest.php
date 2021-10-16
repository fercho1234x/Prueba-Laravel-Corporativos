<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaCorporativoRequest extends FormRequest
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
            'S_RazonSocial' => ['required', 'string', 'max:150'],
            'S_RFC' => ['required', 'string', 'max:13'],
            'S_Pais' => ['string', 'max:75'],
            'S_Estado' => ['string', 'max:75'],
            'S_Municipio' => ['string', 'max:75'],
            'S_ColoniaLocalidad' => ['string', 'max:75'],
            'S_Domicilio' => ['string', 'max:100'],
            'S_CodigoPostal' => ['string', 'max:5'],
            'S_UsoCFDI' => ['string', 'max:45'],
            'S_UrlRFC' => ['string', 'max:255', 'url'],
            'S_UrlActaConstitutiva' => ['string', 'max:255', 'url'],
            'S_Activo' => ['required', 'in:1,0'],
            'S_Comentarios' => ['string', 'max:255'],
            'corporativo_id' => ['required', 'exists:corporativos,id']
        ];
    }
}
