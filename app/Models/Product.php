<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'description',
        'name',
        'price',
        'show',
        'fk_id_category'
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

    public function materials()
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
