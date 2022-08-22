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

    protected $appends = [
        'absolute_image_url',
    ];

    public function store()
    {
        return $this->belongsTo(
            Store::class,
            'fk_id_store'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'fk_id_category'
        );
    }

    public function materials()
    {
        return $this->belongsToMany(
            RawMaterial::class,
            'product_material',
            'fk_id_product',
            'fk_id_material'
        )->with('unit')
        ->withPivot([
            'quantity'
        ])->withTimestamps();
    }

    public function getAbsoluteImageUrlAttribute() {
        return asset($this->image_url);
    }

}
