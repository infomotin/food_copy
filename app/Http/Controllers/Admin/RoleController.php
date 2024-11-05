<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Exports\PermitionExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermitionImport;
use App\Models\Admin;

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
    //EditPermition
    public function EditPermition($id){
        $permition = Permission::find($id);
        return view('admin.backend.page.permission.edit',compact('permition'));
    }
    //UpdatePermition
    public function UpdatePermition(Request $request,$id){
        $permition = Permission::find($id);
        $permition->name = $request->name;
        $permition->group_name = 'admin';
        $permition->group_name = $request->group_name;
        $permition->save();
        return redirect()->route('all.permition')->with('success','Permition Updated Successfully');
    }
    //DeletePermition
    public function DeletePermition($id){
        $permition = Permission::find($id);
        $permition->delete();
        return redirect()->route('all.permition')->with('success','Permition Deleted Successfully');
    }
    //AdminChangeStatus
    public function AdminChangeStatus(Request $request){
        // dd($request->id, $request->status);
        $permition = Permission::find($request->id);
        if( $$request->status == 'active'){
            $permition->status = 'inactive';
        }else{
            $permition->status = 'active';
        }
        $permition->save();
        return response()->json(['success' => 'Status Change Successfully', 'status' =>  $permition->status], 200);
    }
    //AdminAddImport
    public function AdminAddImport(){
        return view('admin.backend.page.permission.import');
    }
    //AdminImportStore
    public function AdminImportStore(Request $request){
        // dd($request->all());
        // $permition = PermitionImport::create(
        //     [
        //         'name' => $request->name,
        //         'guard_name' => 'admin',
        //         'group_name' => $request->group_name
        //     ]
        // );
        Excel::import(new PermitionImport, $request->file('file'));

        return redirect()->route('admin.all.permition')->with('success','Permition Added Successfully');
    }
    //AdminExport
    public function AdminExport(){
        return Excel::download(new PermitionExport, 'permition.xlsx');
    }
    //AdminImport
    public function AdminImport(){
        return view('admin.backend.page.permission.import');
    }

    //AdminAllRole
    public function AdminAllRole(){
        $roles = Role::all();
        return view('admin.backend.page.role.index',compact('roles'));
    }
    //AdminAddRole
    public function AdminAddRole(){
        return view('admin.backend.page.role.add');
    }
    //AdminAddRoleStore
    public function AdminAddRoleStore(Request $request){
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        return redirect()->route('all.role')->with('success','Role Added Successfully');
    }
    //AdminEditRole
    public function AdminEditRole($id){
        $role = Role::find($id);
        return view('admin.backend.page.role.edit',compact('role'));
    }
    //AdminUpdateRole
    public function AdminUpdateRole(Request $request,$id){
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('all.role')->with('success','Role Updated Successfully');
    }
    //AdminDeleteRole
    public function AdminDeleteRole($id){
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('all.role')->with('success','Role Deleted Successfully');
    }
    //AdminAllRolePermition
    public function AdminAllRolePermition(){
        $roles = Role::all();
        $permitions = Permission::all();
        $permition_group = Admin::getPermissionsGroup();

        return view('admin.backend.page.role.rolesetup',compact('roles','permitions','permition_group'));
        
    }
}
