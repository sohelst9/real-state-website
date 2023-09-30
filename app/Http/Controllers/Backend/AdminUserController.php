<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminUserController extends Controller
{
    //--index
    public function index()
    {
        $datas = Admin::latest()->paginate(10);
        return view('backend.adminuser.index', [
            'datas' => $datas
        ]);
    }

    //--edit
    public function edit($id)
    {
        $roles = Role::get();
        $data = Admin::findOrFail($id);
        return view('backend.adminuser.edit', [
            'data' => $data,
            'roles' => $roles,
        ]);
    }

    //--update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        $data = Admin::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'role_id' => $request->role,
        ]);

        // if ($request->password) {
        //     $data->update([
        //         'password' => Hash::make($request->password)
        //     ]);
        // }

        if ($request->hasFile('image')) {
            //old image delete----
            $old_image = $data->image;
            $oldPath = 'Uploads/Admin/' . $old_image;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
            //new image upload
            $name = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('Uploads/Admin'), $name);
            $data->update(['image' => $name]);
        }
        return back()->with('message', 'Updated Successfully !!');
    }

    //-delete
    public function delete($id)
    {
        $data = Admin::findOrFail($id);
        if ($data->image) {
            $oldFile = $data->image;
            $oldPath = 'Uploads/Admin/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
        }

        $data->delete();
        return back()->with('message', 'Acoount has been Deleted !!');

    }
}
