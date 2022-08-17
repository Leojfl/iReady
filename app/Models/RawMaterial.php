<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $table = 'material';

    protected $fillable = [
        'code',
        'img_url',
        'description',
        'group',
        'unit',
        'provider',
        'price',
        
    ];
    
}