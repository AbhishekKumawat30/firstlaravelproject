<?php

namespace App\Http\Controllers\esh2\expenses;
use App\Models\Expense;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Redirect;
class ExpenseController extends Controller
{
    
    public function add(Request $request){
       
       // event(new StatusLiked('sent',16));
        if($request->isMethod('post')){
            $add = new Expense;
            $add->expense_type = $request->expense_type;
            $add->expense_name = $request->expense_name;
            $add->user_name = $request->user_name;
            $add->date = $request->date;
            $add->quantity = $request->quantity;
            $add->rate = $request->rate;
            $add->total = $request->total;
            $add->attachment = $request->attachment;
            $add->total_amt = $request->total_amt;
            $add->description = $request->description;
            $add->save();
            
            return response()->json(['status' => 1, 'message' => 'Expense Add Successful']);
        }
       
        return view('esh2.expenses.add');
    }
    
    public function list(Request $request){
        $data = Expense::orderBy('id', 'DESC')->get();
        return view('esh2.expenses.list',['data' => $data]);
    }
    
    public function view(Request $request){
        return view('esh2.expenses.view');
    }
    
    
    
    public function edit(Request $request,$id){
        $data = Expense::find($id);
        if($request->isMethod('post')){
              
            $data->expense_type = $request->expense_type;
            $data->expense_name = $request->expense_name;
            $data->user_name = $request->user_name;
            $data->date = $request->date;
            $data->quantity = $request->quantity;
            $data->rate = $request->rate;
            $data->total = $request->total;
            $data->attachment = $request->attachment;
            $data->total_amt = $request->total_amt;
            $data->description = $request->description;
            $data->save();
        	  
        return response()->json(['status' => 1, 'message' => 'Expense Update Successful']);
    }

     return view('esh2.expenses.edit',['data'=>$data]);
     
    } 
  
    
    public function delete($id)
    {
        // Find the imagegallery by ID
        $expenses = Expense::find($id);
    
    
    
        // Delete the imagegallery
        $expenses->delete();
    
        return redirect::to('esh2/expenses/list')->with('message', 'Expense deleted successfully');
    }

    function statusChange(Request $request)
    {
        try {

            $expenses = Expense::find($request->id);

            $expenses->status = $request->status_id;
            $expenses->save();

            return response()->json([
                'success' => true,
                'message' => 'Expense status updated successfully.',
                'id' => $expenses->id,
                'status' => $expenses->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Expense status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
