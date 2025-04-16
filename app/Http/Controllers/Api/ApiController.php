<?php

namespace App\Http\Controllers\Api;   

use Illuminate\Http\Request;
use App\Models\WebsiteAmc;
use App\Models\Setting;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use File;
use DB;
use URL;
use Image;

   use Carbon\Carbon;

class ApiController extends BaseController
{
    public function destroySchoolToken(Request $request){
        
           $data = WebsiteAmc::Select('website_amc.*','website_amc_history.amount as software_amount')
                                ->leftjoin('website_amc_history','website_amc_history.amc_id','website_amc.id')->where('website_amc.token_no',$id)->first();
   
 
        //$data = WebsiteAmc::where('token_no',$id)->first();
        $contactData = Setting::select('email','phone','bank_name','bank_ifsc','bank_acc_type','bank_acc_no','bank_acc_owner','bank_acc_owner_mobile')->where('id',1)->first();
      //  $support = User::where('in_support_list',1)->select('name','mobile','designation','skill')->get();
        $support = null;
        $amcDate = Carbon::parse($data->emc_date);
        $currentDate = Carbon::now();
        $remainingDays = $currentDate->diffInDays($amcDate, false);
        $expiring = 0;
        if ($remainingDays <= 6 && $remainingDays >= 0) {
            $expiring = 1; //Software expiring within 7 days
        }
     
        if($request->isMethod('GET')){
            $total_payment_done =0;
            $messageToShow ='';
            if($data['show_payment_notice'] == 1 || $data['emc_date'] <= date('Y-m-d')) 
            {
                $total_payment_done = DB::table('payments')->where('client_amc_id',$data['id'])->whereNull('deleted_at')->sum('amount');
               
               
               $total_payment_done =  ($data['software_amount'] ?? 0)-($total_payment_done ?? 0);
               
               if($total_payment_done > 0)
               {
                   $messageToShow = 'Your software amount is due.Please pay to avoid interruption.Avoid Message if already paid.';
               }
               else
               {
                   $messageToShow = 'Your Annual Maintenance Contract (AMC) amount is due.Please pay to avoid interruption.Avoid Message if already paid';
               }
              
            }
            
            // if($data['website_link'] == $request->header('origin')){}else{
            //     return response()->json(['status'=>2, 'contact'=>$contactData, 'support'=>$support, 'data'=>$data, 'expiring'=>$expiring,'messageToShow'=>$messageToShow]);
            // }
            
            if($data['emc_date'] >= date('Y-m-d')){
                return response()->json(['status'=>1, 'contact'=>$contactData, 'support'=>$support, 'data'=>$data, 'expiring'=>$expiring ,'messageToShow'=>$messageToShow]); //Everything OK & Software expiry date is far away
            }else{
                return response()->json(['status'=>0, 'contact'=>$contactData, 'support'=>$support, 'data'=>$data, 'expiring'=>$expiring,'messageToShow'=>$messageToShow]);
            }
            
        }else if($request->isMethod('POST')){
            
            if(!empty($request->transaction_id)){
                $invoice = new Invoice;
                $invoice->transaction_id = $request->transaction_id;
                $invoice->payment_type = "AMC";
                $invoice->service_name = "Software Update";
                $invoice->date = date('Y-m-d');
                $invoice->invoice_no = mt_rand(100000,999999);
                $invoice->user_id = $data->id;
                $invoice->website_amc_id = $data->id;
                $invoice->name = $data->name;
                $invoice->mobile = $data->mobile;
                $invoice->amount = $data->amc_amount;
                $invoice->save();
                
                $data->emc_date = date('Y-m-d', strtotime('+1 year'));
                $data->save();

                $emails = array($data->email,$contactData->email);
                
                $emailData = ['email' => $emails, 'data'=>$data, 'contact'=>$contactData, 'subject' => 'Software Update Transaction Successful'];
                //Helper::sendMail('emails.software_amc_successful', $emailData);
        
                return response()->json(['status'=>3, 'contact'=>$contactData, 'support'=>$support, 'data'=>$data]);
            }else{
                return response()->json(['status'=>4, 'contact'=>$contactData, 'support'=>$support, 'data'=>$data]);
            }
            
        }

    }
    
    public function checkInstallation(Request $request, $id){
        
        $computerName = gethostname();
       // dd($computerName);
        
        $data = WebsiteAmc::where('token_no',$id)->first();
        
        
        $plainText = 8209949186;
        //$encrypted = Crypt::encryptString($plainText);
        
        return response()->json(['installation' => $data->installation, 'domain' => $data->website_link]);
        // if($data->installation == 1){
        //   //dd('Installation Already Done!');
        //     return response()->json(['installation'=> $data->installation]);
        // }else{
        //     //dd('Token Is Fresh!');
        //     return response()->json(['installation'=> $data->installation]);
        // }
    }
    
    public function destroySchoolToken(Reqquest $request){
        $data = WebsiteAmc::where('token_no',$id)->update(['installation' => 1]);
    }
    
    public function sendInstallationToken(Request $request, $id){
        //if($request->isMethod('POST')){
            $data = WebsiteAmc::where('token_no',$id)->first();
            $otp = mt_rand(1000, 9999);
            $plainText = 8209949186;
            $email = ['skwork91@gmail.com','veonkumawat@gmail.com'];
            $emailData = ['email'=>$email,'otp'=>$otp,'subject'=>'🤫 OTP For New Installation of School Software 🗝'];
            $whatsapp = "🤫 _OTP For New Installation of School Software_ *" . $otp . "* 🗝 \n  
Hi Sunil Kumar,

I hope this message finds you well. I wanted to inform you that our software team has initiated the installation process for the School ERP Software at *" . $data->website_name . "* \n *Token : *" . $data->token_no . " \n *Owner : *" . $data->name . " \n *Contact No. : *" . $data->mobile . " \n *Location : *" . $data->address . " \n \n We've begun setting up the necessary infrastructure and configuring the software according to the school's requirements.

The team is working diligently to ensure a smooth and efficient installation process, and we're committed to delivering a high-quality solution that meets the school's needs.


Best regards,
Rukmani Software️";
              //Helper::sendMail('auth.new_installation',$emailData);
              //Helper::sendWhatsappMessage('8949868687', $whatsapp);
                  Helper::sendWhatsappMessage('8209949186', $whatsapp);
            return response()->json(['status'=>1, 'otp'=>$otp]);
        //}  
    }

    public function checkSoftwareLock(Request $request, $id){

        $data = WebsiteAmc::where('token_no',$id)->first();
        if($data->website_link == $request->header('RequestUrl')){
            
        }else{
            $lock = new SoftwareLock;
            $lock->client_id = $data->id;
            $lock->token_no = $id;
            $lock->request_url = $request->header('RequestUrl');
            $lock->ip_address = $request->ip();
            $lock->user_agent = $request->header('User-Agent');
            $lock->location = Http::get("https://ipinfo.io/json");
            $lock->save();
        }
        
        return response()->json(['domain' => $data->website_link]);
       
    }
    }

