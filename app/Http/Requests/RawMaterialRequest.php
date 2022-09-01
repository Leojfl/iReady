<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RawMaterialRequest extends FormRequest
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
            'name'     => 'required', 
            'quantity' => 'required',
            'min_stok' => 'required',
            'max_stok' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => 'Falto por llenar este campo',
            'quantity.required' => 'Falto por llenar este campo',
            'min_stok.required' => 'Falto por llenar este campo',
            'max_stok.required' => 'Falto por llenar este campo',
        ];
    }
}
