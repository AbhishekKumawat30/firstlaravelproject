<?php

namespace App\Models\esh2\enquiry;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Enquiry extends Model
{
        use SoftDeletes;
        protected $table = "enquirys"; //table name

}
