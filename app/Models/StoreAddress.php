<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreAddress extends Model
{
    use HasFactory;

    protected $table = 'store_address';

    protected $fillable = [
        'city',
        'colony',
        'zip_code',
        'street',
        'ext_num',
        
    ];
    
}