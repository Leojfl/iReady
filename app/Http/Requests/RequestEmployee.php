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
            //USER
            'username' => 'required',
            'password' => 'required',
            //Employee
            'name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'rfc' => 'required',
            'curp' => 'required',
            'social_security' => 'required',
            'salary' => 'required',
            //contact data
            'phone' => 'required',
            'email' => 'required',
            'cell_phone' => 'required',
            //address
            'street' => 'required',
            'ext_num' => 'required',
            'int_num' => 'required',
            'colony' => 'required',
            'city' => 'required',
            'township' => 'required',
            'zip_code' => 'required',

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
            //USER
            'username.required' => 'Usuario requerido',
            'password.required' => 'Contraseña requerida',
            //Employee
            'name.required' => 'Nombre requerido',
            'last_name.required' => 'Apellido paterno requerido',
            'second_last_name.required' => 'Apellido materno requerido',
            'rfc.required' => 'RFC requerido',
            'curp.required' => 'CURP requerido',
            'social_security.required' => 'Seguro social requerido',
            'salary.required' => 'Salario requerido',
            //contact data
            'phone.required' => 'Télefono requerido',
            'email.required' => 'Correo electronico requerido',
            'cell_phone.required' => 'Celular requerido',
            //address
            'street.required' => 'Calle requerida',
            'ext_num.required' => 'Número exterior requerido',
            'int_num.required' => 'Número interior requerido',
            'colony.required' => 'Colonia requerida',
            'city.required' => 'Ciudad requerida',
            'township.required' => 'Municipio requerido',
            'zip_code.required' => 'Codigo postal requerido'

        ];
    }
}
