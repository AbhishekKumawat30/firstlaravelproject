<?php

namespace App\Http\Controllers\esh2\user;
use App\Models\esh2\customers\Customer;
use App\Models\Setting;
use App\Models\esh2\user\User;
use Illuminate\Validation\Validator; 
use App\Helpers\helper;
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

class UserController extends Controller
{

    public function userList(Request $request){
        
        return view('esh2.user.userList');
    }
    
    public function createUser(Request $request){
        
        if($request->isMethod('post')){
                $add = new User;
                $add->role_id = $request->role_id;
                $add->name = $request->name;
                $add->mobile = $request->mobile;
                $add->mobile2 = $request->mobile2;
                $add->email = $request->email;
                $add->address = $request->address;
                $add->remark = $request->remark;
                $add->save(); 
              
                }
        return view('esh2.user.createUser');
    }

}
