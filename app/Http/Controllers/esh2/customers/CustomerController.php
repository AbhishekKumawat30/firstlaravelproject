<?php

namespace App\Http\Controllers\esh2\customers;
use App\Models\esh2\customers\Customer;
use App\Models\Setting;
use Illuminate\Validation\Validator; 
use App\Helpers\helper;
use App\Events\StatusLiked;
use Session;
use Hash;
use Str;
use Redirect;
use Auth;
use DB;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CustomerController extends Controller
{
    
    public function gettingStarted(Request $request){
       
       // event(new StatusLiked('sent',16));
        if($request->isMethod('post')){
            $add = new Customer;
            $add->clint_status = $request->clint_status;
            $add->name = $request->name;
            $add->mobile = $request->mobile;
            $add->mobile2 = $request->mobile2;
            $add->email = $request->email;
            $add->project_name = $request->project_name;
            $add->project_link = $request->project_link;
            $add->domain_name = $request->domain_name;
            $add->project_mode = $request->project_mode;
            $add->project_type = $request->project_type;
            $add->registration_date = $request->registration_date;
            $add->domain_expire_date = $request->domain_expire_date;
            $add->emc_date = $request->amc_date;
            $add->amc_amount = $request->amc_amount;
            $add->state_id = $request->state_id;
            $add->city_id = $request->city_id;
            $add->student_count = $request->student_count;
            $add->user_count = $request->user_count;
            $add->branch_count = $request->branch_count;
            $add->userName = $request->userName;
            $add->password = $request->password;
            $add->address = $request->address;
            $add->plan_details = $request->plan_details;
            
            $add->remark = $request->remark;
            if($request->file('image')){
                $image = $request->file('image');
                $document =  $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/customers';
                $image->move($destinationPath, $document);  
                $add->image = $document;
            } 
            if($request->file('invoiceimage')){
                $image = $request->file('invoiceimage');
                $document =  $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/customers/invoice';
                $image->move($destinationPath, $document);  
                $add->invoiceimage = $document;
            } 
            $add->save();
            
            return response()->json(['status' => 1, 'message' => 'Customer Add Successful']);
        }
       
        return view('esh2.customers.gettingStarted');
    }
    
    public function list(Request $request){
        $data = Customer::orderBy('id', 'DESC')->get();
        return view('esh2.customers.list',['data' => $data]);
    }
    
    public function view(Request $request){
        return view('esh2.customers.view');
    }
    
    
    
    public function edit(Request $request,$id){
        $data = Customer::find($id);
        if($request->isMethod('post')){
              
            $data->clint_status = $request->clint_status;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->mobile2 = $request->mobile2;
            $data->email = $request->email;
            $data->project_name = $request->project_name;
            $data->project_link = $request->project_link;
            $data->domain_name = $request->domain_name;
            $data->project_mode = $request->project_mode;
            $data->project_type = $request->project_type;
            $data->registration_date = $request->registration_date;
            $data->domain_expire_date = $request->domain_expire_date;
            $data->emc_date = $request->amc_date;
            $data->amc_amount = $request->amc_amount;
            $data->state_id = $request->state_id;
            $data->city_id = $request->city_id;
            $data->student_count = $request->student_count;
            $data->user_count = $request->user_count;
            $data->branch_count = $request->branch_count;
            $data->userName = $request->userName;
            $data->password = $request->password;
            $data->address = $request->address;
            $data->plan_details = $request->plan_details;
            $data->remark = $request->remark;
            if($request->file('image')){
                $image = $request->file('image');
                $document = time() . uniqid() .   $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/customers';
                $image->move($destinationPath, $document);  
                if(File::exists(env('IMAGE_UPLOAD_PATH').'esh2/customers/'.$data->image)){
                        File::delete(env('IMAGE_UPLOAD_PATH').'esh2/customers/'.$data->image);
                    } 
                $data->image = $document;
            } 
            // if($request->file('invoiceimage')){
            //     $image = $request->file('invoiceimage');
            //     $document =  $image->getClientOriginalName();
            //     $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/customers';
            //     $image->move($destinationPath, $document);  
            //     $data->invoiceimage = $document;
            // } 
            $data->save();
        	  
        return response()->json(['status' => 1, 'message' => 'Customer Update Successful']);
    }

     return view('esh2.customers.edit',['data'=>$data]);
     
    } 
    
    public function listOnMap(Request $request){
        $data = Customer::where('status', 1)->whereNotNull('lat')->whereNotNull('lon')->get();
        return view('esh2.customers.listOnMap', ['data' => $data]);
    }
}
