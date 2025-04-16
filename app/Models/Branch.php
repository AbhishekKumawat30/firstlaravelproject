<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
        use SoftDeletes;
	protected $table = "branchs"; //table name
   
    public static function totalBranch(){
        $data=Branch::where('branch_id',Session::get('branch_id'))->sum('amount');
        return $data;
    }
    
    public static function thisMonthBranch(){
        $data=Branch::where('branch_id',Session::get('branch_id'))->whereMonth('date',date('m'))->sum('amount');
        return $data;
    }
    
    public static function todayBranch(){
        $data=Branch::where('branch_id',Session::get('branch_id'))->where('date',date('Y-m-d'))->sum('amount');
        return $data;
    }
}
