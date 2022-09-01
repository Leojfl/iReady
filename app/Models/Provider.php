<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    protected $table = 'provider';

    protected $fillable = [
        'name',
        'last_name',
        'second_last_name',
        'phone',
        'email',
    ];
}
