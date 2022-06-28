<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreData extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $fillable = [
        'name',
        'owner',
        'phone',
        'rfc',
        'description',
        'img_url',
    ];
    
}