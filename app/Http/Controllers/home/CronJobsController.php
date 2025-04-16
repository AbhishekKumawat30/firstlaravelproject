<?php

namespace App\Http\Controllers\home;
use Illuminate\Validation\Validator; 
use App\Models\State;
use App\Models\City;
use App\Models\esh2\enquiry\Enquiry;
use App\Models\esh2\enquiry\EnquiryStatus;
use App\Models\esh2\enquiry\EnquiryHistory;
use App\Models\esh2\user\User;
use App\Models\CronJobs;
use App\Helpers\helper;
use Session;
use Hash;
use Str;
use Redirect;
use Response;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CronJobsController extends Controller

{

    public function cronJobs(){
        
        //$this->birthdayMessage();
        $this->todayEnquiryStatus();
        $this->dailyEnquiryReminder();
        $this->everyEnquiryReminder();
        
    }

    public function birthdayMessage(){
        
        $title = "Hi Shinu";
        $message = "Just GOING WITH FLOW 🌈";
        $deviceToken = "web-7b2b9f82-4b65-4da1-af0a-94d39a6c9101";
        $link = "https://web.rusoft.in/esh2/enquiry/list";

        Helper::sendPusherPushNotification($deviceToken, $title, $message, $link);

        
        // $today = now();
        // $time = date("H:i A");
       
        // if($time == "00:15 AM"){
     
        //     $cronJobs = new CronJobs;
        //     $cronJobs->function_name = __FUNCTION__;
        //     $cronJobs->save();
        
        //     $students = Admission::whereMonth('dob',$today->month)->whereDay('dob',$today->day)->where('status',1)->get(['mobile', 'first_name', 'last_name']);
      
        //     $template =  MessageTemplate::Select('message_templates.*','message_types.slug')
        //                         ->leftjoin('message_types','message_types.id','message_templates.message_type_id')
        //                       ->where('message_types.status',1)->where('message_types.slug','birthday-wishes')->first();
        //     $branch = Branch::find(1);
        //     $setting = Setting::where('session_id',3)->where('branch_id',1)->first();
           
        //     $arrey1 =   array(
        //                     '{#name#}',
        //                     '{#school_name#}');
                            
        //     if($branch->whatsapp_srvc == 1){
                
        //         foreach($students as $stu){
                    
        //             $arrey2 = array(
        //                             $stu->first_name . ' ' . $stu->last_name,
        //                             $setting->name);
                            
        //             if ($stu->mobile != ""){
        //                     $whatsapp = str_replace($arrey1,$arrey2,$template->whatsapp_content);
        //                     Helper::sendWhatsappMessage($stu->mobile,$whatsapp);
        //             }
        //         }
        //     }
        // }
    }
    
    public function todayEnquiryStatus(){
        $dayOfWeek = date('w');
        $currentTime = date('H:i');
        $allowedTimes = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'];
       
        if(in_array($currentTime, $allowedTimes) && $dayOfWeek != 0){
            $cronJobs = new CronJobs;
            $cronJobs->function_name = __FUNCTION__;
            $cronJobs->save();
        
            $user = User::whereIn('role_id', ['3','6'])->where('status', 1)->orderBy('id', 'DESC')->get();
            $whatsapp = [];
            $i = 0;
            foreach($user as $us){
                $i++;
                $data = Enquiry::whereDate('updated_at', date('Y-m-d'))->where('user_id', $us->id)->count();
                $content = "> " . $us->name . " | Today Updated : *" . $data . "*";
                $whatsapp[] = $content;
            }
            $message = implode("\n\n", $whatsapp);
            $groupid = '120363174132993625@g.us';
            //Helper::whatsappGroupMessage($message, $groupid);
            Helper::sendWhatsappMessage('7851083755', $message);
            $title = "Current Enquiry Updates 👍";
            $deviceToken = "web-7b2b9f82-4b65-4da1-af0a-94d39a6c9101";
            $link = "https://web.rusoft.in/esh2/enquiry/list";
            Helper::sendPusherPushNotification($deviceToken, $title, $message, $link);
        }        
    }

   public function dailyEnquiryReminder() {

        $enquirydaily = Enquiry::select('enquirys.*', 'users.name as user_name')
                ->leftJoin('users', 'users.id', 'enquirys.user_id')
                ->whereDate('enquirys.reminder_date', date('Y-m-d'))->whereBetween('enquirys.reminder_date', [now(), now()->addHour()])
                ->groupBy('enquirys.id')->get();
                
        if($enquirydaily->count() > 0){
             
            $whatsapp = [];
            $i = 0;
            foreach($enquirydaily as $data){
                $i++;
                $content = "$i Name : ".$data->name." "."Mobile : ".$data->mobile." "."Reminder Date : ".date('l, d-m-Y, h:i A', strtotime($data->reminder_date))." "."Address : ".$data->address.","."User : ".$data->user_name . " | Message : *" . $data->message . "*";
                $whatsapp[] = $content;
            }
            $message = implode("\n\n", $whatsapp);
            $groupid = '120363174132993625@g.us';
            //Helper::whatsappGroupMessage($message, $groupid);
            Helper::sendWhatsappMessage('7851083755', $message);
            $title = "Enquiry Reminder 👍";
            $deviceToken = "web-7b2b9f82-4b65-4da1-af0a-94d39a6c9101";
            $link = "https://web.rusoft.in/esh2/enquiry/list";
            Helper::sendPusherPushNotification($deviceToken, $title, $message, $link);
        }
                                        
    }
    
    public function everyEnquiryReminder(){
        
        $enquirydaily = Enquiry::select('enquirys.*', 'users.name as user_name')
                ->leftJoin('users', 'users.id', 'enquirys.user_id')
                ->whereDate('enquirys.reminder_date', date('Y-m-d'))->where('enquirys.reminder_date', date('Y-m-d H:i'))
                ->groupBy('enquirys.id')->get();
                
        if($enquirydaily->count() > 0){
             
            $whatsapp = [];
            $i = 0;
            foreach($enquirydaily as $data){
                $i++;
                $content = "$i Name : ".$data->name." "."Mobile : ".$data->mobile." "."Reminder Date : ".date('l, d-m-Y, h:i A', strtotime($data->reminder_date))." "."Address : ".$data->address.","."User : ".$data->user_name . " | Message : *" . $data->message . "*";
                $whatsapp[] = $content;
            }
            $message = implode("\n\n", $whatsapp);
            $title = "Enquiry Reminder 👍";
            $deviceToken = "web-7b2b9f82-4b65-4da1-af0a-94d39a6c9101";
            $link = "https://web.rusoft.in/esh2/enquiry/list";
            Helper::sendWhatsappMessage('7851083755', $message);
            Helper::sendPusherPushNotification($deviceToken, $title, $message, $link);
        }
        
    }
        
}
