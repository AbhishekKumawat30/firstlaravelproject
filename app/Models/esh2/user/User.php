<?php

namespace App\Models\esh2\user;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class User extends Model
{
        use SoftDeletes;
        protected $table = "users"; //table name

}
