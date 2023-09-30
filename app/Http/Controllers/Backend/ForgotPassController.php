<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\UserEmailVeridy;
use App\Models\Admin\Admin;
use App\Models\Backend\ResetAdminPassOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class ForgotPassController extends Controller
{
    //--password_recovery
    public function password_recovery()
    {
        return view('auth.admin.password.password-recovery');
    }

     //--password_recovery_store
     public function password_recovery_store(Request $request)
     {
         $request->validate([
             'email'=>'required|email',
         ]);
         $admin = Admin::where('email', $request->email)->first();
         $email = $admin->email ?? '';
         if ($email) {
             $otp = random_int(100000, 999999);
              ResetAdminPassOtp::create([
                 'admin_id' => $admin->id,
                 'otp' => $otp,
             ]);
             $data = $otp;
             Mail::to($admin->email)->send(new UserEmailVeridy($data));
             return redirect()->route('admin.otp');
         } else {
             return back()->with('error', 'plz Enter valid email!');
         }
     }

      //---otp
    public function otp(){
        return view('auth.admin.password.otp');
    }

    //--otp_match
    public function otp_match(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $otps = ResetAdminPassOtp::where('otp', $request->otp)->first();
        $otp = $otps->otp ?? '';

        if ($otp == $request->otp) {
            return redirect()->route('admin.new.password', encrypt($otp));
        } else {
            return back()->with('error', 'Your Otp is Wrong!');
        }
    }

    //--new_password
    public function new_password($otp)
    {
        $otp = decrypt($otp);
        return view('auth.admin.password.new-password', compact('otp'));
    }

    //--new_password_store--
    public function new_password_store(Request $request)
    {
        $request->validate([
            'password' => ['required','max:10', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), 'confirmed'],
        ]);

        $reset_otp = ResetAdminPassOtp::where('otp', $request->otp)->first();
        $otp_user_id = $reset_otp->admin_id ?? '';
        $admin = Admin::where('id', $otp_user_id)->first();
        $login_user_id = $admin->id ?? '';


        if($otp_user_id == $login_user_id){
            $admin->update([
                'password'=>Hash::make($request->password),
            ]);
            $reset_otp->delete();

            return redirect()->route('admin.login')->with('success', 'Your Password Reset Successfully. Plz Login!');
        }
        else{
            return back()->with('error', 'You are Not Register. Plz First Registration!');
        }
    }
}
