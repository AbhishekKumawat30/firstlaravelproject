<?php

namespace App\Models\esh2\students;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Student extends Model
{
        use SoftDeletes;
        protected $table = "students"; 
}
