<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\PropertyType;
use App\Models\Backend\Setting;
use App\Models\City;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        View::share([
            'setting'=>$setting
        ]);
    }

    //--search
    public function search(Request $request)
    {
        $status = $request->status;
        $type = $request->type;
        $city = $request->city;
        if($status == 1){
            $properties = Property::where('status', 1)->where('management_check', 1)->where('admin_check', 1)->where('p_selling_type', $status)->where('p_type', $type)->where('p_city', $city)->get();
        }

        if($status == 2){
            $properties = Property::where('status', 1)->where('management_check', 1)->where('admin_check', 1)->where('p_selling_type', $status)->where('p_type', $type)->where('p_city', $city)->get();
        }
        return view('frontend.page.search', [
            'properties'=>$properties
        ]);
    }

    //--index
    public function index()
    {
        $properties = Property::where('status', 1)->where('management_check', 1)->where('admin_check', 1)->latest()->limit(12)->get();
        $f_properties = Property::where('status', 1)->where('management_check', 1)->where('admin_check', 1)->where('p_feature', 1)->latest()->limit(20)->get();
        $agents = User::where('type', 2)->limit(15)->get();
        $property_types = PropertyType::get();
        $cities = City::get();
        return view('frontend.index', [
            'properties'=>$properties,
            'f_properties'=>$f_properties,
            'agents'=>$agents,
            'property_types'=>$property_types,
            'cities'=>$cities,
        ]);
    }
}
