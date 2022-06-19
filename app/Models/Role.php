<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role whereName($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    CONST ADMIN = 1;
    CONST STORE = 2;
    CONST MANAGER = 3;
    CONST WAITER = 4;
    CONST DELIVERY = 5;
    CONST CLIENT = 6;

    protected $table = 'role';

    public static function asMap()
    {
        return self::all()->pluck('name', 'id');
    }

    public static function asMapWeb()
    {
        return self::all()
            ->pluck('name', 'id');
    }

}
