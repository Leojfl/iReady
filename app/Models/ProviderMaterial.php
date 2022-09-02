<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderMaterial extends Model
{

    protected $table = 'provider_material';

    protected $fillable = [
        'date',
        'description',
        'quantity',
        'price',
        'fk_id_provider',
        'fk_id_raw_material'
    ];


    public function provider()
    {
        return $this->belongsTo(
            Provider::class,
            'fk_id_provider'
        );
    }

    public function material()
    {
        return $this->belongsTo(
            RawMaterial::class,
            'fk_id_raw_material'
        );
    }
}
