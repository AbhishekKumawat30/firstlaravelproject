<?php

namespace App\Http\Controllers\Auth;
use App\Models\esh2\user\User;
use App\Models\Logs;
use App\Models\State;
use App\Models\WhatsappApiResponse;
use App\Models\CronJobs;
use App\Models\Setting;
use App\Models\Master\Branch;
use App\Models\Master\MessageTemplate;
use App\Models\Master\MessageType;
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
use App\Services\IpLocationService;

class AuthController extends Controller
{
    
    


        public function getLocation(Request $request, IpLocationService $ipLocationService)
        {
            $ip = $request->input('ip');
            $location = $ipLocationService->getLocation($ip);
            return response()->json($location);
        }

    public function login(Request $request, IpLocationService $ipLocationService){
      
        if($request->isMethod('post')){
            
            $usersCount = User::count();

            if($usersCount > 0){
                
                $userData = User::where('userName',$request->username)->first();
                $password = $request->password;
                
                if(!empty($userData)){

                    if($userData['status'] == 1){
                        if(Hash::check($password, $userData->password)){ 
                          
                            $request->session()->put('id',$userData->id);
                            $request->session()->put('name',$userData->name);
                            $request->session()->put('email',$userData->email);
                            $request->session()->put('mobile',$userData->mobile);
                            $request->session()->put('dob',$userData->dob);
                            $request->session()->put('address',$userData->address);
                            $request->session()->put('photo',$userData->photo);
                            $request->session()->put('designation',$userData->designation);
                            $request->session()->put('status',$userData->status);
                            $request->session()->put('role_id',$userData->role_id);
                            $request->session()->put('sidebars',$userData->sidebars);
                            $request->session()->put('created_at',$userData->created_at);

                            $findOldDevices = Logs::where('event', 'login')->where('user_id', $userData->id)->where('user_agent', $request->header('User-Agent'))->count();
                            if($findOldDevices < 1){
                                $emailData = ['email'=>$userData['email'],'userName'=>$userData['userName'],'confirm_password'=>$userData['confirm_password'],'subject'=>'Login Details Rukmanisoft!'];
                                //Helper::sendMail('auth.forgot_mail',$emailData);
                            }
                            
                            $logs = new Logs;
                            $logs->user_id = $userData->id;
                            $logs->event = 'login';
                            $logs->ip_address = $request->ip();
                            $logs->user_agent = $request->header('User-Agent');
                            $logs->save();
                            
                            return response()->json(['status' => 1, 'message' => 'Login Successful']);
                      
                        }else{
                            return response()->json(['status' => 0, 'message' => 'Invalid Password']);
                        }
                    }else{
                        return response()->json(['status' => 0, 'message' => 'Login details are Inactive']);
                    }
                    
                }else{
                    return response()->json(['status' => 0, 'message' => 'Invalid UserName']);
                }

            }else{
                return response()->json(['status' => 0, 'message' => 'No User Available']);
            }            
            
        }
        
        return view('authentication/layouts/corporate/sign-in');
    }


	public function logout() {
          Auth::logout();
          Session::flush();
          return redirect("login")->with('message','Logout successfully!'); 
    }
    
    public function changePassword(Request $request){


        // $dbHost = config('database.connections.mysql.host');
        // $dbPort = config('database.connections.mysql.port');
        // $dbName = config('database.connections.mysql.database');
        // $dbUsername = config('database.connections.mysql.username');
        // $dbPassword = config('database.connections.mysql.password');

        // $command = exec(sprintf('mysqldump -h %s -P %s -u %s -p%s %s > %s', $dbHost, $dbPort, $dbUsername, $dbPassword, $dbName, 'databaseBackup.sql'));


        $id = session()->get("id"); 
        
            if($request->isMethod('post')){
               $request->validate([
            'password' => "required|min:4|same:confirm_password",
            'confirm_password' => "required:min:4|same:password",
            'old_password' => 'required',
            
        ]);
            if(session()->get("role_id") == 3){
                $userData = Admission::where('id',$id)->where('confirm_password',$request->old_password)->get()->first();
            }else{
                $userData = User::where('id',$id)->where('confirm_password',$request->old_password)->get()->first();
            }
         
       if(!empty($userData)){
         $userData->update(['password'=> Hash::make($request->password)]);
         $userData->confirm_password  =$request->confirm_password;
         $userData->save();
         
        if(!empty($userData->teacher_id)){
            $teacher = Teacher::where('id',$userData->teacher_id)->first();
            if(!empty($teacher)){
                 $teacher->password = $request->confirm_password;
                 $teacher->save();
            }
        }
        
        return redirect("/")->with('message','Password Changed successfully!');  
       }else{
           return redirect("change_password")->with('error','Invalid Old Password');  
       }
            }
        return view('auth.changepassword');
           
    }

    public function forgotPassword(Request $request){
       
        if($request->isMethod('post')){
            $request->validate([
                
                'email' => 'required'
                
                ]);

            $userdata = User::where('userName',$request->email)->get()->first();
 
            $studentdata = Admission::where('userName',$request->email)->get()->first();
          
            if(!empty($userdata)){
                if(!empty($userdata['email'])){
                 
                    $emailData = ['email'=>$userdata['email'],'userName'=>$userdata['userName'],'confirm_password'=>$userdata['confirm_password'],'subject'=>'Login Details Rukmanisoft!'];
                    
                           Helper::sendMail('auth.forgot_mail',$emailData);
            
                    return redirect::to('login')->with('message','Login Details Sent Successfully Please Check Your E-mail.');  
                }else{
                    return redirect::to('forgot_password')->with('error','Your E-mail id not found !');
                }
            	                 
                }
                
                 if(!empty($studentdata)){
                if(!empty($studentdata['email'])){
                    $emailData = ['email'=>$studentdata['email'],'userName'=>$studentdata['userName'],'confirm_password'=>$studentdata['confirm_password'],'subject'=>'Login Details Rukmanisoft!'];
                    
                           Helper::sendMail('auth.forgot_mail',$emailData);
            
                    return redirect::to('login')->with('message','Login Details Sent Successfully Please Check Your E-mail.');  
                }else{
                    return redirect::to('forgot_password')->with('error','Your E-mail id not found !');
                }
            	                 
                }
                else{
                    return redirect::to('forgot_password')->with('error','User Name is Incorrect !'); 
                }
            
              
            }
        return view('auth.forgot_password');
    }
    
    public function setSidebar(Request $request){
        if($request->isMethod('POST')){
            $otp = mt_rand(1000, 9999);
            $email = ['skwork91@gmail.com','veonkumawat@gmail.com'];
            $emailData = ['email'=>$email,'otp'=>$otp,'subject'=>'🤫 OTP For New Installation of School Software 🗝'];
            $whatsapp = "🤫 _OTP For New Installation of School Software_ *" . $otp . "* 🗝️";
            Helper::sendMail('auth.new_installation',$emailData);
            //Helper::sendWhatsappMessage('8949868687', $whatsapp);
            //Helper::sendWhatsappMessage('8209949186', $whatsapp);
            return response()->json(['status'=>1, 'otp'=>$otp]);
        }        
        return view('auth.setSidebar');
    }
    

}
