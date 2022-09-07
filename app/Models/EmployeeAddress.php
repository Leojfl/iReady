<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class EmployeeAddress extends Model
{
    protected $table = 'employee_address';

    protected $fillable = [
        'country',
        'city',
        'colony',
        'zip_code',
        'street',
        'ext_num',
        'int_num',
        'township',
        'zip code'
    ];
/*
    protected $appends = [
        'full_address',
    ];
    */
}
