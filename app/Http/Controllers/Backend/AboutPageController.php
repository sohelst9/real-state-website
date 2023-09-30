<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutPage;
use App\Models\Contact;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    //---about
    public function about()
    {
        $about = AboutPage::first();
        return view('backend.about.index', [
            'about'=>$about
        ]);
    }

    public function about_change(Request $request)
    {
        $request->validate([
            'page_content' => 'required',
        ]);
        $about = AboutPage::first();
        if ($about == '') {
            
            AboutPage::create([
                'page_content'=>$request->page_content,
            ]);
            return back()->with('message', 'About page Content Inserted!');
        }
        else{
            $about->update([
                'page_content'=>$request->page_content,
            ]);
            return back()->with('message', 'About page Content Updated!');
        }
    }

    //--contact_message
    public function contact_message()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('backend.contact-message.index', [
            'contacts'=>$contacts,
        ]);
    }

    //--admin_newsletter
    public function admin_newsletter()
    {
        $newsletters = Newsletter::latest()->paginate(20);
        return view('backend.newsletters.index', [
            'newsletters'=>$newsletters,
        ]);
    }
}
