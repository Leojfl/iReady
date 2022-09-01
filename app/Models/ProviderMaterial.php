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
        'fk_id_provider'
    ];


}
