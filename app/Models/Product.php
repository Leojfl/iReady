<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'active',
        'name'
    ];

    public static function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public static function messages()
    {
        return [
            'name.required' => 'El nombre de la ruta es requerido'
        ];
    }



    public function store()
    {
        return $this->belongsTo(
            Store::class,
            'fk_id_store'
        );
    }

    public function material()
    {
        return $this->belongsToMany(
            Material::class,
            'product_material',
            'fk_id_product',
            'fk_id_material'
        )->withPivot([
            'quantity'
        ])->withTimestamps();
    }

}
