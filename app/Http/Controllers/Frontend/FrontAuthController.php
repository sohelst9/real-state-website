<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\UserEmailVeridy;
use App\Models\Backend\Setting;
use App\Models\User;
use App\Models\UserEmailVerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class FrontAuthController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        View::share([
            'setting'=>$setting
        ]);
    }
    //--login--
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('auth.login');
    }
    //--login_store
    public function login_store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index')->with('message', 'You are successfully logged in');
        } else {
            return redirect()->route('login')->with('error', 'Login details are not valid');
        }
    }

    //---register--
    public function register()
    {
        return view('auth.register');
    }
    //---register_store
    public function register_store(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>'nullable|numeric',
            'type'=>'required',
            'password' => ['required','max:10', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(), 'confirmed'],
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = uniqid().$file->getClientOriginalName();
            $filePath = public_path('Uploads/Users');
            $request->file('image')->move($filePath, $image_name);

            User::find($user->id)->update([
                'image' => $image_name
            ]);
        }

        //---send mail --
        if($user){
             $otp = random_int(100000, 999999);
             UserEmailVerifyCode::create([
                'user_id'=>$user->id,
                'code'=>$otp,
             ]);

             $data = $otp;

             Mail::to($user->email)->send(new UserEmailVeridy($data));
        }


        // Automatically log in the user
        Auth::login($user);
        return redirect()->route('verify')->with('success', 'Email Verification Code has been sent to your mail address.');
    }

    //---verify
    public function verify(){
        return view('auth.verify');
    }

    //--code_match
    public function code_match(Request $request)
    {
        $request->validate([
            'verify_code' => 'required'
        ]);

        $otps = UserEmailVerifyCode::where('code', $request->verify_code)->first();
        $otp = $otps->code ?? '';

        if ($otp == $request->verify_code) {
            $otps->delete();
            return redirect()->route('index')->with('message', 'Registration Has Been Successfully!');
        } else {
            return back()->with('error', 'Your Verification Code is Wrong!');
        }
    }
}
