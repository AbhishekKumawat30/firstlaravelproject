<?php

namespace App\Http\Controllers\esh2\inventery;
use App\Models\esh2\inventery\Inventery;
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

class InventeryController extends Controller
{
    
    public function add(Request $request){
       
       // event(new StatusLiked('sent',16));
        if($request->isMethod('post')){
            $add = new Inventery;
            $add->company = $request->company;
            $add->item_name = $request->item_name;
            $add->quantity_stock = $request->quantity_stock;
            $add->amount = $request->amount	;
            $add->total_amount = $request->total_amount;
            $add->available_stock = $request->available_stock;
            $add->date = $request->date;
            $add->save();
            
            return response()->json(['status' => 1, 'message' => 'Inventery Add Successful']);
        }
       
        return view('esh2.inventery.add');
    }
    
    public function list(Request $request){
        $data = Inventery::orderBy('id', 'DESC')->get();
        return view('esh2.inventery.list',['data' => $data]);
    }
    
    // public function view(Request $request){
    //     return view('esh2.inventery.list');
    // }
    
    
    
        public function edit(Request $request,$id){
            $data = Inventery::find($id);
        
            if($request->isMethod('post')){
            
                $data->company = $request->company;
                $data->item_name = $request->item_name;
                $data->quantity_stock = $request->quantity_stock;
                $data->amount = $request->amount	;
                $data->total_amount = $request->total_amount;
                $data->available_stock = $request->available_stock;
                $data->date = $request->date;
                $data->save();
                
            return response()->json(['status' => 1, 'message' => 'Inventery Update Successful']);
        }

        return view('esh2.inventery.edit',['data'=>$data]);

        } 
    
    public function delete($id)
    {
        // Find the inventery by ID
        $inventery = Inventery::find($id);
    
    
    
        // Delete the inventery
        $inventery->delete();
    
        return redirect::to('esh2/inventery/list')->with('message', 'Inventery deleted successfully');
    }
}
