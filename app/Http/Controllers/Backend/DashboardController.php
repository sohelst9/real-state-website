<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    //--dashboard
    public function dashboard()
    {
        $users = User::count();
        $property = Property::count();
        $properties = Property::latest()->limit(10)->get();

        return view('backend.dashboard', [
            'users'=>$users,
            'property'=>$property,
            'properties'=>$properties,
        ]);
    }

    //--users
    public function users(Request $request)
    {
        $users = User::where('fname', 'like', '%' . $request->search . '%')->latest()->paginate(20);
        return view('backend.user.index', [
            'users'=>$users
        ]);
    }

    //--delete_user
    public function delete_user($id)
    {
        $data = User::findOrFail($id);
        if ($data->image) {
            $oldFile = $data->image;
            $oldPath = 'Uploads/Users/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
        }
        $data->delete();
        return back()->with('message', 'User Or Agent Delete Success!');
    }
}
