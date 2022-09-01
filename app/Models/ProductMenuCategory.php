<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class ProductMenuCategory extends Model
{
    protected $table = 'product_menu_category';


    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'fk_id_product'
        );
    }

    public function menucategory()
    {
        return $this->belongsTo(
            Menucategory::class,
            'fk_id_menu_category'
        );
    }

}