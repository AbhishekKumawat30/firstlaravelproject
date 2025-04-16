<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Certificate extends Model
{
        use SoftDeletes;
	protected $table = "certificate"; //table name
   
    public static function totalCertificate(){
        $data=Certificate::where('branch_id',Session::get('branch_id'))->sum('amount');
        return $data;
    }
    
    public static function thisMonthCertificate(){
        $data=Certificate::where('branch_id',Session::get('branch_id'))->whereMonth('date',date('m'))->sum('amount');
        return $data;
    }
    
    public static function todayCertificate(){
        $data=Certificate::where('branch_id',Session::get('branch_id'))->where('date',date('Y-m-d'))->sum('amount');
        return $data;
    }
}
