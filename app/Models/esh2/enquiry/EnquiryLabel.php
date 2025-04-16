<?php

namespace App\Models\esh2\enquiry;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class EnquiryLabel extends Model
{
        use SoftDeletes;
        protected $table = "enquiry_labels"; //table name

}
