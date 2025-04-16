<?php

namespace App\Models\esh2\customers;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Customer extends Model
{
        use SoftDeletes;
        protected $table = "customers"; //table name

}
