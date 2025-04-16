<?php

namespace App\Models\esh2\inventery;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Inventery extends Model
{
        use SoftDeletes;
        protected $table = "inventery"; 
}
