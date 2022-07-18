<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'active',
        'fk_id_user',
        'fk_id_store'
    ];
}
