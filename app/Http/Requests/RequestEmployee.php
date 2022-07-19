<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestEmployee extends FormRequest
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
            'active' => 'required',
            'fk_id_user' => 'required',
            'fk_id_store' => 'required',
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
            'active.required' => 'Falto por llenar este campo',
            'fk_id_user.required' => 'Falto por llenar este campo',
            'fk_id_store.required' => 'Falto por llenar este campo',
        ];
    }
}
