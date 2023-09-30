<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutPage;
use App\Models\Backend\Setting;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        View::share([
            'setting'=>$setting
        ]);
    }
    //---property
    public function property()
    {
        $properties = Property::where('status', 1)->where('management_check', 1)->where('admin_check', 1)->latest()->paginate(30);
        return view('frontend.page.property',[
            'properties'=>$properties
        ]);
    }
    //---agent
    public function agent()
    {
        $agents = User::where('type', 2)->limit(15)->get();
        return view('frontend.page.agent',[
            'agents'=>$agents
        ]);
    }
    //---about
    public function about()
    {
        $about = AboutPage::first();
        return view('frontend.page.about',[
            'about'=>$about
        ]);
    }
    //---contact
    public function contact()
    {
        return view('frontend.page.contact');
    }

    //--contact_store
    public function contact_store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        return back()->with('message', 'Message Sent Successfully!');
    }
    //---details
    public function details($id)
    {
        $property = Property::with('GalleryImage')->findOrFail($id);
        $f_properties = Property::where('status', 1)->where('management_check', 1)->where('admin_check', 1)->where('p_feature', 1)->latest()->limit(4)->get();
        $agents = User::where('type', 2)->limit(4)->get();
        return view('frontend.page.details', [
            'property'=>$property,
            'f_properties'=>$f_properties,
            'agents'=>$agents,
        ]);
    }

    //--mail_store
    public function mail_store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        return back()->with('message', 'Mail Send Successfully!');
    }

    //---newsletter
    public function newsletter(Request $request){
        $request->validate([
            'email'=>'required|email',
        ]);
        Newsletter::create([
            'email'=>$request->email,
        ]);
        return back()->with('message', 'Newsletters Added !');
    }
    
}
