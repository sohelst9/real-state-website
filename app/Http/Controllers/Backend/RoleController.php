<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //--index
    public function index(){
        $roles = Role::paginate(10);
        return view('backend.role.index', [
            'roles'=>$roles,
        ]);
    }

    //--create
    public function create(){
        return view('backend.role.create');
    }

    //--store
    public function store(Request $request){
        $request->validate(['name'=>'required']);
        Role::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name, '-'),
        ]);

        return redirect()->route('admin.role')->with('message', 'Role Created Successfully !!');
    }
}
