<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\Password;

class AgentDashbaordController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        View::share([
            'setting'=>$setting
        ]);
    }
    //--dashboard
    public function dashboard()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.agent.dashboard', [
            'user' => $user
        ]);
    }

    //-profile_update
    public function profile_update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'UserName' => ['required', 'string', 'max:255'],
            'phone' => 'nullable|numeric',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'name' => $request->UserName,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        if($request->hasFile('image')){
            //old image delete----
            $old_image = $user->image;
            $oldPath ='Uploads/Users/'.$old_image;
            if($oldPath){
                File::delete(public_path($oldPath));
            }
            //new image upload
           $name = uniqid().'-'.$request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('Uploads/Users'), $name);
            $user->update(['image'=>$name]);
        }
        return back()->with('message', 'Profile Updated !!');
    }

    //--password
    public function password()
    {
        return view('frontend.agent.password_change_tap');
    }

    //--password_update
    public function password_update(Request $request)
    {
        $request->validate([
            'OldPassword'=>'required',
            'password' => ['required','max:10', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), 'confirmed'],
        ]);
        if(Hash::check($request->OldPassword, Auth::user()->password)){
            // return 'password mass';
            User::find(auth()->user()->id)->update([
                'password'=>Hash::make($request->password)
            ]);
            return back()->with('message', 'Your Password Changed !');
        }
        else{
            return back()->with('error', 'Invalid Old Password !');
        }
    }
}
