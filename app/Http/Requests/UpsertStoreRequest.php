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
        return [];
    }

    public function messages()
    {
        return [];
    }

}