<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //--city
    public function city()
    {
        $datas = City::get();
        return view('backend.city.index', [
            'datas'=>$datas
        ]);
    }

    //---city add
    public function city_add()
    {
        return view('backend.city.create');
    }

    public function city_store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        City::create([
            'name'=>$request->name
        ]);
        return redirect()->route('admin.city')->with('message', 'City Created!');
    }
}
