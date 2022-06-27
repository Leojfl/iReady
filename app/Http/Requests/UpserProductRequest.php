<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpserProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public static function rules()
    {
        return Product::rules();
    }

    public function messages()
    {
        return Product::messages();
    }

}
