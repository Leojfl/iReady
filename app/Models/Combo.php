<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Combo extends Model
{
    protected $table = 'combo';

    public function products()
    {

        return $this->belongsToMany(
            Product::class,
            'product_combo',
            'fk_id_combo',
            'fk_id_product'
        )->withPivot([
            'quantity'
        ])->withTimestamps();
    }


}
