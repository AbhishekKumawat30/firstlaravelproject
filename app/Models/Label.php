<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Label extends Model
{
        use SoftDeletes;
        protected $table = "labels"; //table name

}
