<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Unit extends Model
{
    protected $table = 'unit';

    public static function asMap()
    {
        return self::all()->pluck( 'value','id');
    }



}
