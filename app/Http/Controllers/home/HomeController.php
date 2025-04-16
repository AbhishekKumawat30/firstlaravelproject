<?php

namespace App\Http\Controllers\home;
use Illuminate\Validation\Validator; 
use App\Models\State;
use App\Models\City;
use App\Models\esh2\enquiry\Enquiry;
use App\Models\esh2\enquiry\EnquiryStatus;
use App\Models\esh2\enquiry\EnquiryHistory;
use App\Models\esh2\user\User;
use App\Helpers\helper;
use Session;
use Hash;
use Str;
use Redirect;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    
    public function cityData(Request $request, $id){
        if(!empty($id)){
            $getCity = array();      
         
            $getCity = City::where('state_id',$id)->get();
            
            $cityData ='<option value="">Select</option>';
            foreach($getCity as $city){
                $cityData.='<option value="'.$city->id.'">'.$city->name.'</option>';
            }    
            echo $cityData;
        } 
    }

	public function search(Request $request){
	    $enquiryStatus = EnquiryStatus::where('status', 1)->get();
        $user = User::where('status', 1)->orderBy('id', 'DESC')->get();
	    $value = $request->name;
	    if(!empty($value)){
            $enquiry = Enquiry::select('enquirys.*')->where(function($query) use ($value){
    		        $query->where('enquirys.name', 'like', '%' .$value. '%');
                    $query->orWhere('enquirys.mobile', 'like', '%' .$value. '%');
                    $query->orWhere('enquirys.mobile2', 'like', '%' .$value. '%');
                    $query->orWhere('enquirys.email', 'like', '%' .$value. '%');
                    $query->orWhere('enquirys.address', 'like', '%' .$value. '%');
                    $query->orWhere('enquirys.remark', 'like', '%' .$value. '%');
                    $query->orWhere('enquirys.message', 'like', '%' .$value. '%');
        		})->groupBy('enquirys.id')->orderBy('enquirys.updated_at','DESC')->take(40)->get();
	    }else{
	        $enquiry = [];
	    }
      return  view('common.search',['enquiry' => $enquiry, 'enquiryStatus' => $enquiryStatus, 'user' => $user]);
	}
}
