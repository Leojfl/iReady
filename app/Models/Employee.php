<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'username',
        'name',
        'last_name',
        'second_last_name',
        'password',
        'active',
        'fk_id_user',
        'fk_id_store'
    ];
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'fk_id_user'
        );
    }
}
