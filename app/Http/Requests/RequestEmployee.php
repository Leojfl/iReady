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

            'area'       => 'required',

            'workstation' => 'required',

            'url_imge' => 'required',

            'rfc' => 'required',

            'curp' => 'required',

            'phone' => 'required',

            'email' => 'required',

            'cell_phone' => 'required',

            'recidence' => 'required',

            'outdoor_number' => 'required',

            'cp' => 'required',

            'salary' => 'required',

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

            'area.required' => 'Falto por llenar este campo',

            'workstation.required' => 'Falto por llenar este campo',

            'url_imge.required' => 'Falto por llenar este campo',

            'rfc.required' => 'Falto por llenar este campo',

            'curp.required' => 'Falto por llenar este campo',

            'phone.required' => 'Falto por llenar este campo',

            'email.required' => 'Falto por llenar este campo',

            'cell_phone.required' => 'Falto por llenar este campo',

            'recidence.required' => 'Falto por llenar este campo',

            'outdoor_number.required' => 'Falto por llenar este campo',

            'cp.required' => 'Falto por llenar este campo',

            'salary.required' => 'Falto por llenar este campo',

            'password.required' => 'Falto por llenar este campo',

            'active.required' => 'Falto por llenar este campo',
        ];
    }
}
