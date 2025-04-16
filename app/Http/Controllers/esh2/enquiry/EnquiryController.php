<?php

namespace App\Http\Controllers\esh2\enquiry;
use App\Events\DefaultEvent;
use App\Models\Label;
use App\Models\esh2\enquiry\Enquiry;
use App\Models\esh2\enquiry\EnquiryStatus;
use App\Models\esh2\enquiry\EnquiryHistory;
use App\Models\esh2\enquiry\EnquiryLabel;
use App\Models\esh2\user\User;
use App\Models\Setting;
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

class EnquiryController extends Controller
{
    
    public function add(Request $request){
        
        if($request->isMethod('post')){

            $oldEnquiry = Enquiry::where('mobile', $request->mobile)->count();
            
            if($oldEnquiry == 0){
                $enquiry = new Enquiry;
                $enquiry->user_id = Session::get('id');
                $enquiry->type = $request->type;
                $enquiry->name = $request->name;
                $enquiry->mobile = $request->mobile;
                $enquiry->mobile2 = $request->mobile2;
                $enquiry->email = $request->email;
                $enquiry->department_id = $request->department_id;
                $enquiry->address = $request->address;
                $enquiry->remark = $request->remark;
                $enquiry->reminder_date = $request->reminder_date;
                $enquiry->message = $request->message;
                $enquiry->responce_status_id = $request->responce_status_id;
                if($request->file('image')){
                    $image = $request->file('image');
                    $document =  $image->getClientOriginalName();
                    $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/enquiry';
                    $image->move($destinationPath, $document);  
                    $enquiry->image = $document;
                }  
                $enquiry->save();
                
                $history = new EnquiryHistory;
                $history->user_id = Session::get('id');
                $history->enquiry_id = $enquiry->id;
                $history->type = $request->type;
                $history->name = $request->name;
                $history->mobile = $request->mobile;
                $history->mobile2 = $request->mobile2;
                $history->email = $request->email;
                $history->department_id = $request->department_id;
                $history->address = $request->address;
                $history->remark = $request->remark;
                $history->reminder_date = $request->reminder_date;
                $history->message = $request->message;
                $enquiry->responce_status_id = $request->responce_status_id;
                $history->save();
                return response()->json(['status' => 1, 'message' => 'Enquiry Successful']);
                
            }else{
                return response()->json(['status' => 0, 'message' => 'This enquiry already exists']);
            }
            
        }
        
    }
       
    public function list(Request $request){
        
        //event(new DefaultEvent('hello world'));
        
        // $updateEnqHis = DB::table('enquiry_historys')->get();
        // $updateEnq = DB::table('enquirys')->get();
        
        // foreach($updateEnq as $enq){
        //     $updateEnqHis = DB::table('enquiry_historys')->where('enquiry_id', $enq->id)->orderBy('id', 'DESC')->first();
          
        //     $updateMsg = !empty($updateEnqHis->message) ? $updateEnqHis->message : '';
        //     $updateDate = !empty($updateEnqHis->reminder_date) ? $updateEnqHis->reminder_date : '';
        //     $enqUpdate = DB::table('enquirys')->where('id', $enq->id)->update(['message' => $updateMsg, 'reminder_date' => $updateDate]);
        // }
        // dd('Done .');
        
        
        
        
        $enquiryStatus = EnquiryStatus::where('status', 1)->get();
        $label = Label::where('status', 1)->get();
        $user = User::where('status', 1)->orderBy('id', 'DESC')->get();
        $query = Enquiry::where('id', '>', 0);

        if($request->isMethod('post')){
            // $loadedIds = $request->input('loaded_ids', []);
            // $limit = 5000;
          
            // $query = $query->whereNotIn('id', $loadedIds)->orderBy('id','ASC')->get();
            // return  view('esh2.enquiry.appendList',['enquiry' => $query, 'enquiryStatus' => $enquiryStatus, 'user' => $user]);
            
            if(!empty($request->responceStatus)){
                $query = $query->whereIn('responce_status_id', $request->responceStatus);
            }
            if(!empty($request->user_id)){
                $query = $query->whereIn('user_id', $request->user_id);
            }
            if(!empty($request->type)){
                $query = $query->whereIn('type', $request->type);
            }
            if(!empty($request->department_id)){
                $query = $query->whereIn('department_id', $request->department_id);
            }
            if(!empty($request->labelsearch)){
                $enquiryLabel = EnquiryLabel::where('user_id', Session::get('id'))->whereRaw('FIND_IN_SET(?, label_id)', [$request->labelsearch])->pluck('enquiry_id');
                $query = $query->whereIn('id', $enquiryLabel);
            }
            if(!empty($request->searchEnquiryId)){
                $query = $query->where('id', $request->searchEnquiryId);
            }
            if(!empty($request->custom_filter)){
                if($request->custom_filter == 1){
                    $query = $query->whereIn('responce_status_id', ['11','12','13','14','19','21','22','24']);
                }else if($request->custom_filter == 2){
                    $query = $query->whereDate('reminder_date', date('Y-m-d'));
                }else{}
            }
            
            if(!empty($request->responceStatus) || !empty($request->user_id) || !empty($request->type) || !empty($request->department_id) || !empty($request->searchEnquiryId) || !empty($request->custom_filter) || !empty($request->rows)){
                if(!empty($request->rows)){
                    $enquiry = $query->orderBy('updated_at','DESC')->take($request->rows)->get();
                }else{
                    $enquiry = $query->orderBy('updated_at','DESC')->get();
                }
            }else{
                $enquiry = $query->orderBy('updated_at','DESC')->take('50')->get();
            }
        }else{
            $enquiry = $query->orderBy('updated_at','DESC')->take('50')->get();
        }
        
        return view('esh2.enquiry.list', ['enquiry' => $enquiry, 'enquiryStatus' => $enquiryStatus, 'label' => $label, 'user' => $user]);
    }

    public function edit(Request $request, $id){
        
        if($request->isMethod('post')){

            $oldEnquiry = Enquiry::where('id', $id)->count();
          
            if($oldEnquiry == 1){
                $enquiry = Enquiry::find($id);

                $history = new EnquiryHistory;
                $history->user_id = Session::get('id');
                $history->enquiry_id = $enquiry->id;
                $history->type = $enquiry->type == $request->type ? null : $request->type;
                $history->name = $enquiry->name == $request->name ? null : $request->name;
                $history->mobile = $enquiry->mobile == $request->mobile ? null : $request->mobile;
                $history->mobile2 = $enquiry->mobile2 == $request->mobile2 ? null : $request->mobile2;
                $history->email = $enquiry->email == $request->email ? null : $request->email;
                $history->department_id = $enquiry->department_id == $request->department_id ? null : $request->department_id;
                $history->address = $enquiry->address == $request->address ? null : $request->address;
                $history->remark = $enquiry->remark == $request->remark ? null : $request->remark;
                $history->reminder_date = $enquiry->reminder_date == $request->reminder_date ? null : $request->reminder_date;
                $history->message = $enquiry->message == $request->message ? null : $request->message;
                $history->responce_status_id = $enquiry->responce_status_id == $request->responce_status_id ? null : $request->responce_status_id;
                
                if($history->type != null || $history->name != null || $history->mobile != null || $history->mobile2 != null || $history->email != null || $history->department_id != null || $history->address != null || $history->remark != null || $history->reminder_date != null || $history->message != null || $history->responce_status_id != null){
                    $history->save();
                }
             
                $enquiry->user_id = Session::get('id');
                $enquiry->type = $request->type;
                $enquiry->name = $request->name;
                $enquiry->mobile = $request->mobile;
                $enquiry->mobile2 = $request->mobile2;
                $enquiry->email = $request->email;
                $enquiry->department_id = $request->department_id;
                $enquiry->address = $request->address;
                $enquiry->remark = $request->remark;
                $enquiry->reminder_date = $request->reminder_date;
                $enquiry->message = $request->message;
                $enquiry->responce_status_id = $request->responce_status_id;
                if($request->file('enquiryImage')){
                    $image = $request->file('enquiryImage');
                    $document = time() . uniqid() . $image->getClientOriginalName();
                    $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/enquiry';
                    $image->move($destinationPath, $document);  
                    if(File::exists(env('IMAGE_UPLOAD_PATH').'esh2/enquiry/'.$enquiry->image)){
                        File::delete(env('IMAGE_UPLOAD_PATH').'esh2/enquiry/'.$enquiry->image);
                    }      
                    $enquiry->image = $document;
                }  
                $enquiry->save();
                
                $enquiryLabel = EnquiryLabel::where('enquiry_id', $id)->where('user_id', Session::get('id'))->first();
                if(!empty($enquiryLabel)){}else{ $enquiryLabel = new EnquiryLabel; }
                $enquiryLabel->enquiry_id = $id;
                $enquiryLabel->user_id = Session::get('id');
                $enquiryLabel->label_id = !empty($request->label) ? implode(',', $request->label) : null;
                $enquiryLabel->save();
                
                return response()->json(['status' => 1, 'message' => 'Enquiry Update Successful']);
                
            }else{
                return response()->json(['status' => 0, 'message' => 'Error in finding this Id']);
            }
            
        }
        
    }
    
    public function delete(Request $request){
        if($request->isMethod('post')){
            if(!empty($request->deleteId)){
                $data = Enquiry::find($request->deleteId)->delete();
                $labelDelete4 = EnquiryLabel::where('enquiry_id', $request->deleteId)->delete();
                return response()->json(['status' => 1, 'message' => 'Enquiry Delete Successful']);
            }else{
                return response()->json(['status' => 0, 'message' => 'Enquiry Not Found']);
            }
        }
    }
    
    public function view(Request $request, $id){
        $enquiry = Enquiry::find($id);
        $history = EnquiryHistory::where('enquiry_id',$id)->orderBy('id','DESC')->get();
        return view('esh2.enquiry.view', ['enquiry' => $enquiry, 'history' => $history]);
    }
}
