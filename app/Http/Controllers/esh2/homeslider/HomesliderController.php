<?php

namespace App\Http\Controllers\esh2\homeslider;

use App\Models\Homeslider;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
class HomesliderController extends Controller
{
    public function add(Request $request)
    {


        if ($request->isMethod('post')) {
            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            // ]);
            $add = new Homeslider;
            $add->name = $request->name;

            if ($request->file('photo')) {
                $image = $request->file('photo');
                $document = $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/homeslider';
                $image->move($destinationPath, $document);
                $add->photo = $document;
            }

            $add->save();
            return response()->json(['status' => 1, 'message' => 'Homeslider Add Successful']);
        }

        return view('esh2.homeslider.add');
    }

    public function list(Request $request)
    {
        $data = Homeslider::orderBy('id', 'DESC')->get();
        return view('esh2.homeslider.list', ['data' => $data]);
    }

    public function edit(Request $request, $id)
    {
        $homeslider = Homeslider::find($id);
        if (!$homeslider) {
            return redirect()->back()->with('error', 'Homeslider not found.');
        }

        if ($request->isMethod('post')) {
            $homeslider->name = $request->name;

            // Validate the incoming request
            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            // ]);

            if ($request->file('photo')) {
                $image = $request->file('photo');
                $document = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension(); // Ensure a unique filename
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/homeslider';

                // Move the new image to the destination
                $image->move($destinationPath, $document);

                // Delete the old image if it exists
                if (File::exists($destinationPath . '/' . $homeslider->photo)) {
                    File::delete($destinationPath . '/' . $homeslider->photo);
                }

                // Update the photo property
                $homeslider->photo = $document; // Make sure this matches your database column
            }

            $homeslider->save();
            return response()->json(['status' => 1, 'message' => 'Homeslider updated successfully.']);
        }

        return view('esh2.homeslider.edit', compact('homeslider'));
    }


    public function delete($id)
    {
        // Find the homeslider by ID
        $homeslider = Homeslider::find($id);



        // Delete the homeslider
        $homeslider->delete();

        return redirect::to('esh2/homeslider/list')->with('message', 'Homeslider deleted successfully');
    }

    function statusChange(Request $request)
    {
        try {

            $homeslider = Homeslider::find($request->id);

            $homeslider->status = $request->status_id;
            $homeslider->save();

            return response()->json([
                'success' => true,
                'message' => 'Homeslider status updated successfully.',
                'id' => $homeslider->id,
                'status' => $homeslider->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Homeslider status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
