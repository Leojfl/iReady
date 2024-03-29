<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $table = 'board';

    protected $fillable = [
        'name',
        'description',
        'capacity'
    ];

    public function position(){
        return $this->hasOne(
            BoardPosition::class,
            'fk_id_board'
        );
    }



}
