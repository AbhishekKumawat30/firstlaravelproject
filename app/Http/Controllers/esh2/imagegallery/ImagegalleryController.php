<?php

namespace App\Http\Controllers\esh2\imagegallery;
use App\Models\esh2\imagegallery\Imagegallery;
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


class ImagegalleryController extends Controller
{
    
    public function add(Request $request){
       
       // event(new StatusLiked('sent',16));
        if($request->isMethod('post')){
            $add = new Imagegallery;
           
            $add->eventname = $request->eventname;
            $add->image = $request->image;
            $add->status = $request->status;
            $add->action = $request->action;
            if($request->file('image')){
                $image = $request->file('image');
                $document =  $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/imagegallery';
                $image->move($destinationPath, $document);  
                $add->image = $document;
            } 
            if($request->file('invoiceimage')){
                $image = $request->file('invoiceimage');
                $document =  $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/imagegallery/invoice';
                $image->move($destinationPath, $document);  
                $add->invoiceimage = $document;
            } 
            $add->save();
            
            return response()->json(['status' => 1, 'message' => 'Imagegallery Add Successful']);
        }
       
        return view('esh2.imagegallery.add');
    }
    
    public function view(Request $request){
        $data = Imagegallery::orderBy('id', 'DESC')->get();
        return view('esh2.imagegallery.view',['data' => $data]);
    }

    public function edit(Request $request,$id){
        $data = Imagegallery::find($id);
        if($request->isMethod('post')){
            $data->eventname = $request->eventname;
            $data->image = $request->image;
            $data->status = $request->status;
            $data->action = $request->action;
          
           
            if($request->file('image')){
                $image = $request->file('image');
                $document = time() . uniqid() .   $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH').'esh2/imagegallery';
                $image->move($destinationPath, $document);  
                if(File::exists(env('IMAGE_UPLOAD_PATH').'esh2/imagegallery/'.$data->image)){
                        File::delete(env('IMAGE_UPLOAD_PATH').'esh2/imagegallery/'.$data->image);
                    } 
                $data->image = $document;
            } 
            $data->save();
        	  
        return response()->json(['status' => 1, 'message' => 'Imagegallery Update Successful']);
    }

     return view('esh2.imagegallery.edit',['data'=>$data]);
     
    } 
    
    public function delete($id)
    {
        // Find the imagegallery by ID
        $imagegallery = Imagegallery::find($id);
    
    
    
        // Delete the imagegallery
        $imagegallery->delete();
    
        return redirect::to('esh2/imagegallery/view')->with('message', 'Imagegallery deleted successfully');
    }
    function statusChange(Request $request)
    {
        try {

            $imagegallery = Imagegallery::find($request->id);

            $imagegallery->status = $request->status_id;
            $imagegallery->save();

            return response()->json([
                'success' => true,
                'message' => 'Imagegallery status updated successfully.',
                'id' => $imagegallery->id,
                'status' => $imagegallery->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Imagegallery status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
