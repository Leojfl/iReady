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
        'min_stok',
        'max_stok',
    ];
}
