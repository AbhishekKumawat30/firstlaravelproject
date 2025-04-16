<?php

namespace App\Http\Controllers\esh2\faqs;

use App\Models\esh2\faqs\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
class FaqController extends Controller
{
    protected $pageNames = [
        0 => 'Home',
        1 => 'TDS Return',
        2 => 'GST Registration',
        3 => 'GST Modification',
        4 => 'PAN Application',
        5 => 'TAN Application',
        6 => 'IEC Modification',
        7 => 'IEC Registration',
        8 => 'ESI Registration',
        9 => 'Digital Signature',
        10 => 'DIN Application',
        11 => 'EPF Registration',
        12 => 'GST Return',
        13 => 'Income Tax Return',
        14 => 'TDS Return Revision',
        15 => 'PF Return',
        16 => 'ESI Return',
        17 => 'OPC Registration',
        18 => 'Public Limited Company',
        19 => 'E-Commerce Business',
        20 => 'Hindu Undivided Family',
        21 => 'Limited Liability Partnership',
        22 => 'Sole Proprietorship',
        23 => 'Bookkeeping',
    ];

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $add = new Faq;
            $add->question = $request->question;
            $add->answer = $request->answer;
            $add->page_name = $request->page_name;
            $add->status = $request->status;
            $add->save();

            return response()->json(['status' => 1, 'message' => 'Faq Add Successful']);
        }

        return view('esh2.faqs.add', ['pageNames' => $this->pageNames]);
    }

    public function view(Request $request)
    {
        $data = Faq::orderBy('id', 'DESC')->get();
        return view('esh2.faqs.view', ['data' => $data, 'pageNames' => $this->pageNames]);
    }

    public function edit(Request $request, $id)
    {
        $data = Faq::find($id);

        if ($request->isMethod('post')) {
            $data->question = $request->question;
            $data->answer = $request->answer;
            $data->page_name = $request->page_name;
            $data->status = $request->status;

            $data->save();

            return response()->json(['status' => 1, 'message' => 'Faq Update Successful']);
        }

        return view('esh2.faqs.edit', ['data' => $data, 'pageNames' => $this->pageNames]);
    }

    public function delete($id)
    {
        // Find the faqs by ID
        $faqs = Faq::find($id);
    
    
    
        // Delete the faqs
        $faqs->delete();
    
        return redirect::to('esh2/faqs/view')->with('message', 'Faq deleted successfully');
    }
    function statusChange(Request $request)
    {
        try {

            $faqs = Faq::find($request->id);

            $faqs->status = $request->status_id;
            $faqs->save();

            return response()->json([
                'success' => true,
                'message' => 'Faq status updated successfully.',
                'id' => $faqs->id,
                'status' => $faqs->status
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Faq status.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
