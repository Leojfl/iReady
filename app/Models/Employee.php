<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [ 
            'rfc',
            'curp',
            'phone',
            'email',
            'cell_phone',
            'social_security',
            'salary'
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'fk_id_user'
        );
    }

    public function address()
    {
        return $this->hasOne(EmployeeAddress::class, 'fk_id_employee');
    }
}
