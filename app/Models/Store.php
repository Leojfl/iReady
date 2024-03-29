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
        )->with('position');
    }

    public function employees()
    {
        return $this->hasMany(
            Employee::class,
            'fk_id_store'
        );
    }

    public function boards()
    {
        return $this->hasMany(
            Board::class,
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

    public function providers()
    {
        return $this->hasMany(
            Provider::class,
            'fk_id_store'
        );
    }

    public function providerMaterials()
    {
        return $this->hasMany(
            ProviderMaterial::class,
            'fk_id_store'
        );
    }
}
