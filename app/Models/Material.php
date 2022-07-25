<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Material extends Model
{
    protected $table = 'material';
    public function unit()
    {
        return $this->belongsTo(
            Unit::class,
            'fk_id_unit'
        );
    }


}
