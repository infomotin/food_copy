<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //AllPermition

    public function AllPermition(){

        $permitions = Permission::all();

        return view('admin.backend.page.permission.index',compact('permitions'));
    }
    //AddPermition
    public function AddPermition(){
        return view('admin.backend.page.permission.add');
    }
    //AddPermitionStore
    public function AddPermitionStore(Request $request){
        // $request->validate([
        //     'name' => 'required|unique:permissions',
        // ]);
        $permition = Permission::create(
            [
                'name' => $request->name,
                'guard_name' => 'admin',
                'group_name' => $request->group_name
            ]
        );
        return redirect()->route('admin.all.permition')->with('success','Permition Added Successfully');
    }
}
