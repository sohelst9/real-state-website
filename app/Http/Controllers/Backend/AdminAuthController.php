<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Backend\Role;
use App\Models\Backend\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminAuthController extends Controller
{
    //--login
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin.login');
    }
    //--login_store
    public function login_store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully !');
        } else {
            return redirect()->route('admin.login')->with('error', 'Email Or password Invalid !');
        }
    }
    //---register
    public function register()
    {
        $roles = Role::get();
        return view('auth.admin.register', [
            'roles'=>$roles
        ]);
    }
    //--register_store
    public function register_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable|numeric',
            'email' => 'required|email|unique:admins,email',
            // 'role'=>'required',
            // 'image'=>'nullable|image|mimes:png,jpg,jpeg,webp',
            'password' => ['required','max:10', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), 'confirmed'],
        ]);
        $admin =  Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id'=>$request->role,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $image_name = $file->getClientOriginalName();
            $filePath = public_path('Uploads/Admin');
            $request->file('image')->move($filePath, $image_name);

            Admin::find($admin->id)->update([
                'image' => $image_name
            ]);
        }

        return redirect()->route('admin.adminuser')->with('success', 'Account Has Been Created!');
    }

    //logout----
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('error', 'Admin Logout Successfully');
    }

    //change_password----
    public function change_password()
    {
       return view('auth.admin.password-change');
    }

    //change_password_update----
    public function change_password_update(Request $request)
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
        if(Hash::check($request->OldPassword, Auth::guard('admin')->user()->password)){
            // return 'password mass';
            Admin::find(auth()->guard('admin')->user()->id)->update([
                'password'=>Hash::make($request->password)
            ]);
            return redirect()->route('admin.dashboard')->with('message', 'Your Password Changed !');
        }
        else{
            return back()->with('error', 'Invalid Old Password !');
        }
    }

    //setting
    public function setting()
    {
        $setting = Setting::first();
        return view('backend.setting', [
            'setting'=>$setting
        ]);
    }

    //setting_change
    public function setting_change(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'footer_content' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);
        $setting = Setting::first();
        if ($setting == '') {
            $site_logo = $request->file('site_logo');
            $site_logo_name = uniqid() . '-' . $site_logo->getClientOriginalName();
            $filePath = public_path('Uploads/SiteLogo');
            $request->file('site_logo')->move($filePath, $site_logo_name);
            Setting::create([
                'site_logo'=>$site_logo_name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'footer_content'=>$request->footer_content,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ]);
            return back()->with('message', 'Website Setting Created!');
        }
        else{
            $setting->update([
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'footer_content'=>$request->footer_content,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
            ]);

            if ($request->hasFile('site_logo')) {
                $oldFile = $setting->site_logo;
                $oldPath = 'Uploads/SiteLogo/' . $oldFile;
                if ($oldPath) {
                    File::delete(public_path($oldPath));
                }
    
                $name = uniqid() . '_' . 'logo_update' . '.' . $request->file('site_logo')->extension();
                $request->file('site_logo')->move(public_path('Uploads/SiteLogo'), $name);
                $setting->update([
                    'site_logo' => $name,
                ]);
            }
            return back()->with('message', 'Website Setting Updated!');
        }
    }

    //--change_profile
    public function change_profile(){
        $data = Admin::findOrFail(auth()->guard('admin')->user()->id);
        return view('auth.admin.profile', [
            'data'=>$data
        ]);
    }

    //--change_profile_update
    public function change_profile_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = Admin::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

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
}
