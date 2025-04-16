<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use DB;
use Mail;
use Session;
use File;
use App\Models\esh2\user\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Setting;
use App\Models\Sidebar;
use App\Models\Gender;
use App\Models\Master\Role;
use App\Models\Expense;
use App\Models\Sessions;
use DateTime;
use Response;
class Helper{

     public static function getSetting(){
       
       $setting = Setting::where('branch_id',Session::get('branch_id'))->with('Account')->with('City')->with('Country')->with('State')->with('Account')->get()->first();
       
         if(empty($setting)){
            $setting = Setting::where('branch_id',1)->with('Account')->with('City')->with('Country')->with('State')->with('Account')->get()->first();
         }
      
       return $setting;
   
    } 
    
    public static function sendMail($tmplale,$data) {
                /*Mail::send($tmplale, $data, function($message) use ($data) {
                    $message->from(getenv('MAIL_FROM_ADDRESS'));
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    if(!empty($data['file'])){
                        $message->attach($data['file']); 
                    }
                 
               });*/
               
    }

    public static function sendWhatsappMessage($toMobile, $text,$filepath=null,$filename = null){
    	
    	$setting = Setting::first();
    	
        if (!empty($toMobile)) {
          
                    $sendRequest ='sendText';
                       $getData = 'number=91'.$toMobile;
                    if(!empty($filepath)){
                       $sendRequest ='sendFileWithCaption';
                       $getData.='&fileurl='.$filepath;
                    }
                    if(!empty($text)){
                       $getData.='&message='.urlencode($text);
                    }
                  
                    $serverUrl = $setting->whatsapp_api_link . "authentic-key=" . $setting->whatsapp_access_token . "&route=1&" . $getData;
                   
                    $url=$serverUrl;
              
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $output = curl_exec($ch);
                    curl_close($ch);
             
                    return $output;die;
            
            
        }  
    
    }  
    
    // public static function sendWhatsappMessage($toMobile, $text,$filepath=null,$filename = null){
    //     $branch = Setting::first();
        
      
    //     if (!empty($toMobile)) {
    //         if(!empty($filepath)){
    //             $serverUrl = $branch->whatsapp_api_link ?? '';
    //              $params = array(
    //             'number' => '91' . $toMobile,
    //             'type'=>"media",
    //             'message' => "",
    //             'media_url' => $filepath,
    //             'instance_id' => $branch->whatsapp_instance_id,
    //           'access_token' => $branch->whatsapp_access_token,
               
    //         );
    //         $url = $serverUrl . '&' . http_build_query($params);
    //         // dd($url);
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, $url);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         $output = curl_exec($ch);
    //       //
    //         curl_close($ch);
    
    //         // You may want to add error handling here
    
    //         }else{
    //             $serverUrl = $branch->whatsapp_api_link ?? '';
                
               
    //         if(!empty($serverUrl)){
    //             $params = array(
    //                 'number' => '91' . $toMobile,
    //               'type' => 'text',
    //                 'message' => $text,
    //               'instance_id' => $branch->whatsapp_instance_id,
    //               'access_token' => $branch->whatsapp_access_token,              
    //             );
    //             $url = $serverUrl . '&' . http_build_query($params);
    //             $ch = curl_init();
    //             curl_setopt($ch, CURLOPT_URL, $url);
    //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //             $output = curl_exec($ch);
    //           // dd($ch);
    //             curl_close($ch);
    
    //         // You may want to add error handling here
                
    //             // if($branch->whatsapp_api_link == "https://wapp.powerstext.in/api/send?"){    
    //             //     $result =  json_decode($output);
    //             //     if(($result->status ?? '' ) == "success" || ($result->status ?? '' ) == "error"){
    //             //         $message = $result->message;
    //             //         $error = $message->messageTimestamp ?? null;
    //             //         if($error == null){
    //             //             $whatsapp_error = new WhatsappApiResponse;
    //             //             $whatsapp_error->item = json_encode($params);
    //             //             $whatsapp_error->message = $result->message ?? null;
    //             //             $whatsapp_error->save();
    //             //             session()->put('whatsapp_error',$whatsapp_error->message);
    //             //             session()->put('whatsapp_error_respose_id',$whatsapp_error->id);
    //             //         }
    //             //     }
                    
    //             //     return $output;
    //             // }
    //         }else{
    //             // $whatsapp_error = new WhatsappApiResponse;
    //             // $whatsapp_error->item = "Whatsapp Authentication Error";
    //             // $whatsapp_error->message = "Whatsapp Api Url Missing";
    //             // $whatsapp_error->save();
    //             // session()->put('whatsapp_error',$whatsapp_error->message);
    //             // session()->put('whatsapp_error_respose_id',$whatsapp_error->id);
    //         }

    //         }
            
    //     }
    // } 
    
    // public static function whatsappGroupMessage($text, $groupid){
    //     $branch = Setting::first();
    //   if (!empty($text)) {
    //         $serverUrl = "https://wapi.pt1.in/api/send/send_group";
    //         $params = array(
    //             'group_id' => $groupid,
    //             'type' => 'text',
    //             'message' => $text,
    //             'instance_id' => $branch->whatsapp_instance_id,
    //             'access_token' => $branch->whatsapp_access_token
    //         );
    
    //         $url = $serverUrl . '?' . http_build_query($params);

    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, $url);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         $output = curl_exec($ch);
    //         curl_close($ch);
    
    //         return $output;
    //     }
    
    // }


 public static function SendMessage($mobile="",$msg="",$template_id=""){ 
        
        $username = env('SMS_USER_NAME');
        $apiKey = env('SMS_API_KEY');
        $apiRoute = env('SMS_API_ROUTE');
        $sender = env('SMS_SENDER');
        $apiRequest = 'Text';
        $numbers = $mobile; 
        $message = $msg;
        $templateid = $template_id;
        $data = 'username='.$username.'&apikey='.$apiKey.'&apirequest='.$apiRequest.'&route='.$apiRoute.'&mobile='.$numbers.'&sender='.$sender."&TemplateID=".$templateid."&message=".$message;
        $url = 'http://123.108.46.13/sms-panel/api/http/index.php?'.$data;
        $url = preg_replace("/ /", "%20", $url);
        $response = file_get_contents($url);
    }
 /*   public static function sendWhatsappMessage($toMobile, $text, $filename = null){
        if (!empty($toMobile)) {
            $serverUrl = "https://wapi.powerstext.in/api/send";
            $params = array(
                'number' => '91' . $toMobile,
                'type' => 'text',
                'message' => $text,
                'instance_id' => '64D9EB19BF75A',
                'access_token' => '64d9ea6f6f5b4' 
            );

            $url = $serverUrl . '?' . http_build_query($params);
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
    

            return $output;
        }
}*/
   
    public static function sendFcm($device_token="", $title="", $body="", $image="", $icon="", $click_action=""){

            $url = 'https://fcm.googleapis.com/fcm/send';

            $serverKey = getenv('FCM_SERVER_KEY');
            //$sound = env('IMAGE_SHOW_PATH').'map/Bell.mp3';
           
            $data = [
                "registration_ids" => [
    $device_token
  ],
                "notification" => [
                    
                    "title" => $title,
                    "body" => $body,  
                    "image" => $image,  
                    "icon" => $icon,
                    "click_action" => $click_action,
                    "sound" => "894f4976-f9fd-44e9-91ba-054b222f458d",
                        
                ],

            ];
         
            $encodedData = json_encode($data);
        
            $headers = [
                'Authorization:key=' . $serverKey,
                'Content-Type: application/json',
            ];
        
            $ch = curl_init();
            
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
            // Execute post
            
            $result = curl_exec($ch);
            //dd($result);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }        
            // Close connection
            curl_close($ch);
            // FCM response
        
    }  

     public static function getEnquiryStatus(){
       $getEnquiryStatus = EnquiryStatus::whereNull('deleted_at')->get();
       return $getEnquiryStatus;
   
   }
   
    public static function sendPusherPushNotification($deviceToken, $title, $message, $link){

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 19C81A90D2F99ED42C1E15FA6B6D5F882D8D4402F790F84505F9787651552972',
        ])->post('https://b862c2f0-696a-4d4a-953f-8256712c94f9.pushnotifications.pusher.com/publish_api/v1/instances/b862c2f0-696a-4d4a-953f-8256712c94f9/publishes', [
            'interests' => ['default'],
            'device_id' => ['web-0bc3cbdc-5ae5-436c-995c-4502f858f068'],
            'web' => [
                'notification' => [
                    'title' => $title,
                    'body' => $message,
                    'icon' =>  env('IMAGE_SHOW_PATH') . 'default/mini_logo.png',
                    'badge' => env('IMAGE_SHOW_PATH') . 'default/mini_logo.png',
                    'deep_link' => $link
                ],
            ],
        ]);
        
        if ($response->successful()) {
            echo 'Notification sent successfully!';
        } else {
            echo 'Failed to send notification!';
            // Optional: You can inspect the response for debugging
            dd($response->json());
        }
        
    }

      public static function getCount($table_name,$colem_name=null,$method =null,$where_colem_name=null,$where_value_name =null){
       
            $user_id = Session::get('id');
            $result = DB::table($table_name)->where('deleted_at', '=', Null)->where('session_id',Session::get('session_id'))->where('branch_id',Session::get('branch_id'));
            if(!empty($where_colem_name)){
                 $result =$result->where($where_colem_name,$where_value_name);
         
             }
             /*if($user_id > 1){
                 $result =$result->where('user_id',$user_id);
             }*/
            if(!empty($colem_name)){
              $result =$result->$method($colem_name);
            }
          return $result;
   }
     public static function getAllUsers(){
       $getAllUsers = User::whereNull('deleted_at')->get();
       return $getAllUsers;
   
   }

   
    public static function getMonth(){
        $getMonth = Month::orderBy('id','ASC')->get();
        return $getMonth;
    }  
    
   public static function getCountry(){
       $getCountry = Country::orderBy('id', 'DESC')->get();
       return $getCountry;
   }
   
    public static function getState(){
        $country_id = Setting::where('id', 1)->first();
       $getstate = State::where('country_id',$country_id->country_id)->get();
       return $getstate;
    }
   
    public static function getMessageType(){
        $getMessageType = MessageType::where('status',1)->get();
        return $getMessageType;
    }
   
    public static function getCity(){
        $state_id = Setting::where('branch_id',Session::get('branch_id'))->get()->first();
       $getcitie = City::where('state_id',$state_id->state_id)->get();
       return $getcitie;
   }
    
    public static function sidebar1(){
        $user = User::find(Session::get('id'));
       $sidebar1 = Sidebar::where('sidebar2', 0)->where('sidebar3', 0)->where('sidebar4', 0)->where('sidebar5', 0)->where('status', 1)->whereIn('id', explode(',', $user->sidebars))->whereRaw('sidebar1 NOT REGEXP "^[0-9]+$"')->orderBy('id', 'ASC')->get();
       return $sidebar1;
    }
    
    public static function sidebar2($id1){
        $user = User::find(Session::get('id'));
       $sidebar2 = Sidebar::where('sidebar1', $id1)->where('sidebar3', 0)->where('sidebar4', 0)->where('sidebar5', 0)->where('status', 1)->whereIn('id', explode(',', $user->sidebars))->whereRaw('sidebar2 NOT REGEXP "^[0-9]+$"')->orderBy('id', 'ASC')->get();
       return $sidebar2;
    }
    
    public static function sidebar3($id1, $id2){
        $user = User::find(Session::get('id'));
       $sidebar3 = Sidebar::where('sidebar1', $id1)->where('sidebar2', $id2)->where('sidebar4', 0)->where('sidebar5', 0)->where('status', 1)->whereIn('id', explode(',', $user->sidebars))->whereRaw('sidebar3 NOT REGEXP "^[0-9]+$"')->orderBy('id', 'ASC')->get();
       return $sidebar3;
    }
    
    public static function sidebar4($id1, $id2, $id3){
        $user = User::find(Session::get('id'));
       $sidebar4 = Sidebar::where('sidebar1', $id1)->where('sidebar2', $id2)->where('sidebar3', $id3)->where('sidebar5', 0)->where('status', 1)->whereIn('id', explode(',', $user->sidebars))->whereRaw('sidebar4 NOT REGEXP "^[0-9]+$"')->orderBy('id', 'ASC')->get();
       return $sidebar4;
    }
    
    public static function sidebar5($id1, $id2, $id3, $id4){
        $user = User::find(Session::get('id'));
       $sidebar5 = Sidebar::where('sidebar1', $id1)->where('sidebar2', $id2)->where('sidebar3', $id3)->where('sidebar4', $id4)->where('status', 1)->whereIn('id', explode(',', $user->sidebars))->whereRaw('sidebar5 NOT REGEXP "^[0-9]+$"')->orderBy('id', 'ASC')->get();
       return $sidebar5;
    }

    public static function getRole(){
       $getRole = Role::orderBy('id', 'ASC')->get();
       return $getRole;
    }
   
   public static function getgender(){
       $getgenders = Gender::orderBy('id', 'ASC')->get();
       return $getgenders;
   }
 
   public static function getPaymentMode(){
       $getPaymentMode = PaymentMode::orderBy('id', 'ASC')->get();
       return $getPaymentMode;
   } 

   
    public static function getUser(){
      $role=Session::get('role_id');
      $user_id=Session::get('id');
      $teacher_id=Session::get('teacher_id');
      $student_id=Session::get('id');
    
        if($role==3){
           $studentData = Admission::with('ClassTypes')->where('id',$student_id)->where('branch_id',Session::get('branch_id'))->get()->first();
        return $studentData;
        }else{
           $userData = User::where('id',$user_id)->get()->first(); 
        return $userData;
        }
          
    }


}




