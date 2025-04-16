<?php

namespace App\Http\Controllers\esh2\certificate;
use App\Models\Certificate;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Redirect;

class CertificateController extends Controller
{

    public function add(Request $request)
    {

        // event(new StatusLiked('sent',16));
        if ($request->isMethod('post')) {
            $add = new Certificate;
            $add->name = $request->name;
            if ($request->file('photo')) {
                $image = $request->file('photo');
                $document = $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/certificate';
                $image->move($destinationPath, $document);
                $add->photo = $document;
            }
            $add->save();

            return response()->json(['status' => 1, 'message' => 'Certificate Add Successful']);
        }

        return view('esh2.certificate.add');
    }

    public function list(Request $request)
    {
        $data = Certificate::orderBy('id', 'DESC')->get();
        return view('esh2.certificate.list', ['data' => $data]);
    }

    public function view(Request $request)
    {
        return view('esh2.certificate.view');
    }



    public function edit(Request $request, $id)
    {
        $data = Certificate::find($id);
        if ($request->isMethod('post')) {

            $data->name = $request->name;

            if ($request->file('photo')) {
                $image = $request->file('photo');
                $document = $image->getClientOriginalName();
                $destinationPath = env('IMAGE_UPLOAD_PATH') . 'esh2/certificate';
                $image->move($destinationPath, $document);
                $data->photo = $document;
            }
            $data->save();

            return response()->json(['status' => 1, 'message' => 'Certificate Update Successful']);
        }

        return view('esh2.certificate.edit', ['data' => $data]);

    }


    public function delete($id)
    {
        // Find the certificate by ID
        $certificate = Certificate::find($id);



        // Delete the certificate
        $certificate->delete();

        return redirect::to('esh2/certificate/list')->with('message', 'Certificate deleted successfully');
    }

    function statusChange(Request $request)
    {
        try {

            $certificate = Certificate::find($request->id);

            $certificate->status = $request->status_id;
            $certificate->save();

            return response()->json([
                'success' => true,
                'message' => 'Certificate status updated successfully.',
                'id' => $certificate->id,
                'status' => $certificate->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Certificate status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }



}
