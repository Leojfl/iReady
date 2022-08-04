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
            'username' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'password' => 'required',
            'active' => 'required',
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
            'username.required' => 'Falto por llenar este campo',
            'name.required' => 'Falto por llenar este campo',
            'last_name.required' => 'Falto por llenar este campo',
            'second_last_name.required' => 'Falto por llenar este campo',
            'password.required' => 'Falto por llenar este campo',
            'active.required' => 'Falto por llenar este campo',
        ];
    }
}
