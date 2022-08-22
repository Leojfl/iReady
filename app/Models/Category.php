<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'category';

    public static function asMap()
    {
        return self::all()->pluck( 'name','id');
    }


}
