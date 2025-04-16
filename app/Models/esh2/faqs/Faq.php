<?php

namespace App\Models\esh2\faqs;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Faq extends Model
{
        use SoftDeletes;
        protected $table = "faqs"; //table name

}
