<?php

namespace App\Http\Controllers\esh2\roles;
use App\Models\Role;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Redirect;

class RoleController extends Controller
{

    public function add(Request $request)
    {

        // event(new StatusLiked('sent',16));
        if ($request->isMethod('post')) {
            $add = new Role;
            $add->name = $request->name;
            $add->save();

            return response()->json(['status' => 1, 'message' => 'Role Add Successful']);
        }

        return view('esh2.roles.add');
    }

    public function list(Request $request)
    {
        $data = Role::orderBy('id', 'DESC')->get();
        return view('esh2.roles.list', ['data' => $data]);
    }

    public function view(Request $request)
    {
        return view('esh2.roles.view');
    }



    public function edit(Request $request, $id)
    {
        $data = Role::find($id);
        if ($request->isMethod('post')) {

            $data->name = $request->name;
            $data->save();

            return response()->json(['status' => 1, 'message' => 'Role Update Successful']);
        }

        return view('esh2.roles.edit', ['data' => $data]);

    }

    
    public function delete($id)
    {
        // Find the roles by ID
        $roles = Role::find($id);

    

        // Delete the roles
        $roles->delete();

        return redirect::to('esh2/roles/list')->with('message', 'Role deleted successfully');
    }


  
}
