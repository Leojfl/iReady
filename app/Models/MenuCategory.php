<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class MenuCategory extends Model
{
    protected $table = 'menu_category';

    protected $fillable = [
        'alias',
    ];

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'fk_id_category'
        );
    }

    public function menu()
    {
        return $this->belongsTo(
            Menu::class,
            'fk_id_menu'
        );
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_menu_category',
            'fk_id_menu_category',
            'fk_id_product'
        );
    }
}
