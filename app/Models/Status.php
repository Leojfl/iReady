<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    CONST PENDING = 1;
    CONST IN_PREPARATION = 2;
    CONST COMPLETE = 3;
    CONST CANCEL = 4;

}
