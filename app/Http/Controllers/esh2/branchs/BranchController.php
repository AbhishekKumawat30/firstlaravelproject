<?php

namespace App\Http\Controllers\esh2\branchs;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BranchController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $add = new Branch;
            $add->branch_name = $request->branch_name;
            $add->owner_name = $request->owner_name;
            $add->branch_code = $request->branch_code;
            $add->gst_no = $request->gst_no;
            $add->mobile_no = $request->mobile_no;
            $add->email = $request->email;
            $add->country = $request->country;
            $add->state_id = $request->state_id;
            $add->city_id = $request->city_id;
            $add->pin_code = $request->pin_code;
            $add->address = $request->address;
            $add->save();

            return response()->json(['status' => 1, 'message' => 'Branch Add Successful']);
        }

        return view('esh2.branchs.add');
    }

    public function list(Request $request)
    {
        $data = Branch::orderBy('id', 'DESC')->get();
        return view('esh2.branchs.list', ['data' => $data]);
    }

    public function edit(Request $request, $id)
    {
        $data = Branch::find($id);

        if ($request->isMethod('post')) {
            $data->branch_name = $request->branch_name;
            $data->owner_name = $request->owner_name;
            $data->branch_code = $request->branch_code;
            $data->gst_no = $request->gst_no;
            $data->mobile_no = $request->mobile_no;
            $data->email = $request->email;
            $data->country = $request->country;
            $data->state_id = $request->state_id;
            $data->city_id = $request->city_id;
            $data->pin_code = $request->pin_code;
            $data->address = $request->address;
            $data->save();

            return response()->json(['status' => 1, 'message' => 'Branch Update Successful']);
        }

        return view('esh2.branchs.edit', ['data' => $data]);
    }

    public function delete($id)
    {
        // Find the branch by ID
        $branch = Branch::find($id);

        if ($branch) {
            // Delete the branch
            $branch->delete();

            return redirect::to('esh2/branchs/list')->with('message', 'Branch deleted successfully');
        }

        return redirect::to('esh2/branchs/list')->with('error', 'Branch not found');
    }

    function statusChange(Request $request)
    {
        try {

            $branchs = Branch::find($request->id);

            $branchs->status = $request->status_id;
            $branchs->save();

            return response()->json([
                'success' => true,
                'message' => 'Branch status updated successfully.',
                'id' => $branchs->id,
                'status' => $branchs->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Branch status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
    
}
