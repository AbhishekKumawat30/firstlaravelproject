<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
        use SoftDeletes;
	protected $table = "roles"; //table name
   
    public static function totalRole(){
        $data=Role::where('branch_id',Session::get('branch_id'))->sum('amount');
        return $data;
    }
    
    public static function thisMonthRole(){
        $data=Role::where('branch_id',Session::get('branch_id'))->whereMonth('date',date('m'))->sum('amount');
        return $data;
    }
    
    public static function todayRole(){
        $data=Role::where('branch_id',Session::get('branch_id'))->where('date',date('Y-m-d'))->sum('amount');
        return $data;
    }
}
