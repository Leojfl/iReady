<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'name',
        'description',
        'active',
    ];

    public function store()
    {
        return $this->belongsTo(
            Store::class,
            'fk_id_store'
        );
    }

    public function menuCategories()
    {
        return $this->hasMany(
            MenuCategory::class,
            'fk_id_menu'
        )->with('products');
    }

}
