<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UpsertStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return  [
            /*'name' => 'required',
            'owner' => 'required',
            'phone' => 'required',
            'rfc' => 'required',
            'description' => 'required',
            //'img_url' => 'required',
            'city' => 'required',
            'colony' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'ext_num' => 'required',*/
            ];
    }

    public function messages()
    {
        return [
            /*'name.required' => 'Nombre requerido',
            'owner.required' => 'Dueño requerido',
            'phone.required' => 'Telefono requerido',
            'rfc.required' => 'RFC requerido',
            'description.required' => 'Descripcion requerida',
            //'img_url.required' => 'Imagen requerida',
            'city.required' => 'Ciudad requerida',
            'colony.required' => 'Colonia requerida',
            'zip_code.required' => 'Codigo postal requerido',
            'street.required' => 'Calle requerida',
            'ext_num.required' => 'Numero exterior requerido',*/
        ];
    }

}
