<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\UserEmailVeridy;
use App\Models\Backend\ResetPasswordOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    //--account_recovery
    public function account_recovery()
    {
        return view('frontend.password.account-recovery');
    }

    //--account_recovery_store
    public function account_recovery_store(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        $email = $user->email ?? '';
        if ($email) {
            $otp = random_int(100000, 999999);
             ResetPasswordOtp::create([
                'user_id' => $user->id,
                'otp' => $otp,
            ]);
            $data = $otp;
            Mail::to($user->email)->send(new UserEmailVeridy($data));
            return redirect()->route('otp');
        } else {
            return back()->with('error', 'plz valid email');
        }
    }

    //---otp
    public function otp(){
        return view('frontend.password.otp');
    }

    //--otp_match
    public function otp_match(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $otps = ResetPasswordOtp::where('otp', $request->otp)->first();
        $otp = $otps->otp ?? '';

        if ($otp == $request->otp) {
            return redirect()->route('new.password', encrypt($otp));
        } else {
            return back()->with('error', 'Your Otp is Wrong');
        }
    }

    //--new_password
    public function new_password($otp)
    {
        $otp = decrypt($otp);
        return view('frontend.password.new-password', compact('otp'));
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

        $reset_otp = ResetPasswordOtp::where('otp', $request->otp)->first();
        $otp_user_id = $reset_otp->user_id ?? '';
        $user = User::where('id', $otp_user_id)->first();
        $login_user_id = $user->id ?? '';


        if($otp_user_id == $login_user_id){
            $user->update([
                'password'=>Hash::make($request->password),
            ]);
            $reset_otp->delete();

            return redirect()->route('login')->with('message', 'Your Password Reset Successfully. Plz Login!');
        }
        else{
            return back()->with('error', 'You are Not Register. Plz First Registration!');
        }
    }
}
