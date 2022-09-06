<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardPosition extends Model
{
    use HasFactory;

    protected $table = 'board_position';

    protected $fillable = [
        'x',
        'y',
        'description',
        'fk_id_board'
    ];

    public function board()
    {
        return $this->belongsTo(
            Board::class,
            'fk_id_board'
        );
    }
}
