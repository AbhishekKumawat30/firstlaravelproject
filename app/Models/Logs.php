<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Logs extends Model
{
        use SoftDeletes;
	protected $table = "logs"; //table name
    
    
}