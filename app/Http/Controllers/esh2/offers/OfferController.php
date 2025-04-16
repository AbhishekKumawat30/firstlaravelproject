<?php

namespace App\Http\Controllers\esh2\offers;
use App\Models\esh2\offers\Offer;
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

class OfferController extends Controller
{
    
    public function add(Request $request){
       
       // event(new StatusLiked('sent',16));
        if($request->isMethod('post')){
            $add = new Offer;
            $add->name = $request->name;
            $add->from_date = $request->from_date;
            $add->to_date = $request->to_date;
            $add->photo = $request->photo;
            $add->promo_code = $request->promo_code;
           
           
            if($request->file('image')){
                $image = $request->file('image');
                $document =  $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/offers';
                $image->move($destinationPath, $document);  
                $add->image = $document;
            } 
            if($request->file('invoiceimage')){
                $image = $request->file('invoiceimage');
                $document =  $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/offers/invoice';
                $image->move($destinationPath, $document);  
                $add->invoiceimage = $document;
            } 
            $add->save();
            
            return response()->json(['status' => 1, 'message' => 'Offer Add Successful']);
        }
       
        return view('esh2.offers.add');
    }
    
    public function view(Request $request){
        $data = Offer::orderBy('id', 'DESC')->get();
        return view('esh2.offers.view',['data' => $data]);
    }
    
    // public function view(Request $request){
    //     return view('esh2.offers.view');
    // }
    
    
    
    public function edit(Request $request,$id){
        $data = Offer::find($id);
        if($request->isMethod('post')){
              
            $data->name = $request->name;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->photo = $request->photo;
            $data->promo_code = $request->promo_code;
            if($request->file('image')){
                $image = $request->file('image');
                $document = time() . uniqid() .   $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/offers';
                $image->move($destinationPath, $document);  
                if(File::exists(env('IMAGE_UPLOAD_PATH').'esh2/offers/'.$data->image)){
                        File::delete(env('IMAGE_UPLOAD_PATH').'esh2/offers/'.$data->image);
                    } 
                $data->image = $document;
            } 
            // if($request->file('invoiceimage')){
            //     $image = $request->file('invoiceimage');
            //     $document =  $image->getClientOriginalName();
            //     $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/offers';
            //     $image->move($destinationPath, $document);  
            //     $data->invoiceimage = $document;
            // } 
            $data->save();
        	  
        return response()->json(['status' => 1, 'message' => 'Offer Update Successful']);
    }

     return view('esh2.offers.edit',['data'=>$data]);

    } 
    
    public function delete($id)
    {
        // Find the offers by ID
        $offers = Offer::find($id);
    
    
    
        // Delete the offers
        $offers->delete();
    
        return redirect::to('esh2/offers/view')->with('message', 'Offer deleted successfully');
    }

    function statusChange(Request $request)
    {
        try {

            $offers = Offer::find($request->id);

            $offers->status = $request->status_id;
            $offers->save();

            return response()->json([
                'success' => true,
                'message' => 'Offer status updated successfully.',
                'id' => $offers->id,
                'status' => $offers->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Offer status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
