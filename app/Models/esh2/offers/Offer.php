<?php

namespace App\Models\esh2\offers;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Offer extends Model
{
        use SoftDeletes;
        protected $table = "offers"; 
}
