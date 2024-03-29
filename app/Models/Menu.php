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

}