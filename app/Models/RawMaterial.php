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
        'quantity',
        'fk_id_unit',
        'min_stok',
        'max_stok',
        'code',
        'img_url',
        'description',
        'group',
        'provider',
        'price',

    ];

    public function unit()
    {
        return $this->belongsTo(
            Unit::class,
            'fk_id_unit'
        );
    }
}
