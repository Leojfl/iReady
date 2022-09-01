<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    protected $table = 'provider';

    protected $fillable = [
        'name',
        'last_name',
        'second_last_name',
        'phone',
        'email',
    ];

    protected $appends = [
        'full_name',
    ];
    public function getFullNameAttribute() {
        return $this->name.' '.$this->last_name.' '.$this->second_last_name;
    }
}
