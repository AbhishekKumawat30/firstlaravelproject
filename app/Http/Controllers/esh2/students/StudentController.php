<?php

namespace App\Http\Controllers\esh2\students;
use App\Models\esh2\students\Student;
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

class StudentController extends Controller
{

    public function add(Request $request)
    {

        // event(new StatusLiked('sent',16));
        if ($request->isMethod('post')) {
            $add = new Student;
            $add->status = $request->status;
            $add->name = $request->name;
            $add->mobile = $request->mobile;
            $add->email = $request->email;
            $add->dob = $request->dob;
            $add->aadhar = $request->aadhar;
            $add->father_name = $request->father_name;
            $add->father_mobile = $request->father_mobile;
            $add->mother_name = $request->mother_name;
            $add->address = $request->address;


            if ($request->file('photo')) {
                $image = $request->file('photo');
                $document = $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/students';
                $image->move($destinationPath, $document);
                $add->photo = $document;
            }
            if ($request->file('invoiceimage')) {
                $image = $request->file('invoiceimage');
                $document = $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/students/invoice';
                $image->move($destinationPath, $document);
                $add->invoiceimage = $document;
            }
            $add->save();

            return response()->json(['status' => 1, 'message' => 'Student Add Successful']);
        }

        return view('esh2.students.add');
    }

    public function view(Request $request)
    {
        $data = Student::orderBy('id', 'DESC')->get();
        return view('esh2.students.view', ['data' => $data]);
    }

    // public function view(Request $request){
    //     return view('esh2.students.view');
    // }



    public function edit(Request $request, $id)
    {
        $data = Student::find($id);
        if ($request->isMethod('post')) {
            // Update other fields
            $data->status = $request->status;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->email = $request->email;
            $data->dob = $request->dob;
            $data->aadhar = $request->aadhar;
            $data->father_name = $request->father_name;
            $data->father_mobile = $request->father_mobile;
            $data->mother_name = $request->mother_name;
            $data->address = $request->address;

            // Handle photo upload if new photo is uploaded
            if ($request->hasFile('photo')) {
                // Generate a new unique name for the file
                $image = $request->file('photo');
                $document = time() . uniqid() . $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/students/';

                // Move the uploaded photo to the destination
                $image->move($destinationPath, $document);

                // Delete the old photo if it exists
                if ($data->photo && File::exists($destinationPath . $data->photo)) {
                    File::delete($destinationPath . $data->photo);
                }

                // Update the photo field in the database
                $data->photo = $document;
            }

            // Handle other file uploads like invoiceimage (if any)
            if ($request->hasFile('invoiceimage')) {
                $image = $request->file('invoiceimage');
                $document = $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/students/invoice/';
                $image->move($destinationPath, $document);
                $data->invoiceimage = $document;
            }

            // Save the updated data to the database
            $data->save();

            return response()->json(['status' => 1, 'message' => 'Student Update Successful']);
        }

        // Return the edit view with the current student data
        return view('esh2.students.edit', ['data' => $data]);
    }


    public function delete($id)
    {
        // Find the students by ID
        $certificate = Student::find($id);



        // Delete the students
        $certificate->delete();

        return redirect::to('esh2/students/view')->with('message', 'Student deleted successfully');
    }


    function statusChange(Request $request)
    {
        try {

            $students = Student::find($request->id);

            $students->status = $request->status_id;
            $students->save();

            return response()->json([
                'success' => true,
                'message' => 'Student status updated successfully.',
                'id' => $students->id,
                'status' => $students->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Student status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

}
