<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'name',
        'img_url',
        'lastname',
        'area',
        'booth',
        'rfc',
        'curp',
        'phone',
        'email',
        'social_security',
        'active',
        'salary',
        
    ];


}
