<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $table = 'raw_material';

    protected $fillable = [
        'name',
        'fk_id_unit',
        'min_stok',
        'max_stok',
        'code',
        'description',
    ];

    protected $appends = [
        'last_price',
        'last_shopping'
    ];

    public function unit()
    {
        return $this->belongsTo(
            Unit::class,
            'fk_id_unit'
        );
    }

    public function providerMaterial()
    {
        return $this->hasMany(
            ProviderMaterial::class,
            'fk_id_raw_material'
        );
    }

    public function getLastPriceAttribute() {
        if ($this->lastShopping == null){
            return 0;
        }
        return $this->lastShopping->price;
    }

    public function getLastShoppingAttribute() {
        return ProviderMaterial::where('fk_id_raw_material', $this->id)
        ->orderBy('date', 'DESC')
        ->orderBy('price', 'DESC')
        ->first();
    }
}
