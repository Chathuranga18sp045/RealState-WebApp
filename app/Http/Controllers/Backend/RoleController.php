<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permission'));
    }//End Method
    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }//End Method
    public function StorePermission(Request $request){
             $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,

    ]);   
    $notification = array(
        'message' => 'Permission Create Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('all.permission')->with($notification);
    }//End Method
    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    
    }//End Method
    public function UpdatePermission(Request $request){
        
        $per_id = $request->id;
                
        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
    ]);   
    $notification = array(
        'message' => 'Permission Update Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('all.permission')->with($notification);
    }//End Method

    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // Import & Expoert Function
    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    } //End Method
    public function ExportPermission(){
        return view('backend.pages.permission.export_permission');
    } //End Method

    // //////Role all Method ////////
    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));

    } //End Method
    public function AddRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.add_roles');
    }//End Method
    public function StoreRoles(Request $request){
        Role::create([
       'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    } //End Method
    public function EditRoles($id){
        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));
    
    }//End Method
    public function UpdateRoles(Request $request){
        
        $role_id = $request->id;
                
        Role::findOrFail($role_id)->update([
            'name' => $request->name,
         ]);   
    $notification = array(
        'message' => 'Role Update Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('all.roles')->with($notification);
    }//End Method
    public function DeleteRoles($id){
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//End Method

    ////////Add Role Permission All Method //////////////
    public function AddRolesPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles', 'permissions','permission_groups'));
        
    }//End Method
    public function RolePermissionStore(Request $request){
        $data = array();
        $permissions = $request->permission;
        foreach($permissions as $key =>$item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }//foreach Ended 

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
             );
        return redirect()->route('all.roles.permission')->with($notification);
    }//End Method
    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission',compact('roles'));
    }//End Method
    public function AdminEditRoles($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
    
        return view('backend.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }//End Method
    public function AdminRolesUpdate(Request $request, $id)
    {
    $role = Role::findOrFail($id);
    $permissions = $request->permission;

    if (!empty($permissions)) {
        // Convert permission IDs to permission models or names
        $permissionModels = Permission::whereIn('id', $permissions)->get();
        
        // Check if the permissions exist and are for the correct guard
        foreach ($permissionModels as $permission) {
            if ($permission->guard_name !== 'web') {
                return back()->withErrors(['Permission does not exist for the web guard.']);
            }
        }
        // Sync permissions with the role
        $role->syncPermissions($permissionModels);
    }
    $notification = [
        'message' => 'Role Permission Updated Successfully',
        'alert-type' => 'success'
    ];
    return redirect()->route('all.roles.permission')->with($notification);
    } // End Method

    public function AdminDeleteRoles($id){
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //End Method



} 
