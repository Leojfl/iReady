<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    protected $table = 'store';

    public function employees()
    {
        return $this->hasMany(
            Employee::class,
            'fk_id_store'
        );
    }


}
