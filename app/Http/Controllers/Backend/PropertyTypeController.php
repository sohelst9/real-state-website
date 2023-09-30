<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    //--prpoperty_type
    public function prpoperty_type()
    {
        $datas = PropertyType::get();
        return view('backend.property-type.index', [
            'datas'=>$datas
        ]);
    }

    //---prpoperty_type_add
    public function prpoperty_type_add()
    {
        return view('backend.property-type.create');
    }

    public function prpoperty_type_store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        PropertyType::create([
            'name'=>$request->name
        ]);
        return redirect()->route('admin.prpoperty_type')->with('message', 'Property Type Created!');
    }
}
