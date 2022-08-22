<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    protected $table = 'store';

    protected $fillable = [
        'name',
        'owner',
        'phone',
        'rfc',
        'description',
        //'img_url',
    ];

    public function address(){
        return $this->hasOne(
            StoreAddress::class,
            'fk_id_store'
        );
    }

    public function employees()
    {
        return $this->hasMany(
            Employee::class,
            'fk_id_store'
        );
    }

    public function materials()
    {
        return $this->hasMany(
            RawMaterial::class,
            'fk_id_store'
        );
    }
}
