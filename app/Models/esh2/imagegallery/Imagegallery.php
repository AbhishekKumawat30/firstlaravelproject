<?php

namespace App\Models\esh2\imagegallery;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Imagegallery extends Model
{
        use SoftDeletes;
        protected $table = "imagegallery"; 
}
