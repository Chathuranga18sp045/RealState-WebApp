<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }// }End Method

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }// }End Method

    public function AdminLogin(){
        return view('admin.admin_login');
    }// }End Method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    } //  End Method
    
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
        // Set Notifications
        $notification = array(
            'message' =>'Admin Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //  End Method

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }//  End Method

            // for POST method we user Reques $request
    public function AdminUpdatePassword(Request $request){
        // validation
        $request->validate([
            'old_password'=> 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password,auth::user()->password)) {
        $notification = array(
            'message' => 'Old Password Does Not Match !',
            'alert-type' => 'error'
        );
        return back()->with($notification);
        }

        //update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }//  End Method

 ///////  Admin User All Method  /////////
    public function AllAdmin(){
        $alladmin = User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin',compact('alladmin'));
    }//End Method

    public function AddAdmin(){
        $roles = Role::all();
        return view('backend.pages.admin.add_admin',compact('roles'));
    }//End Method

    public function StoreAdmin(Request $request) {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();
    
        // Check if roles is an array, if not convert it to an array
        $roles = is_array($request->roles) ? $request->roles : [$request->roles];
    
        if ($roles) {
            foreach ($roles as $roleId) {
                $role = Role::find($roleId);
                if ($role) {
                    $user->assignRole($role->name);
                } else {
                    return redirect()->back()->withErrors(['roles' => 'The selected role does not exist.']);
                }
            }
        }
    
        $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.admin')->with($notification);
    }//End Method

    public function EditAdmin($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('user', 'roles'));
    }//End Method

    public function UpdateAdmin(Request $request,$id){
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        // Remove Exixten Data
        $user->roles()->detach();

        // Check if roles is an array, if not convert it to an array
        $roles = is_array($request->roles) ? $request->roles : [$request->roles];
    
        // Assign new roles
        $roles = is_array($request->roles) ? $request->roles : [$request->roles];
        foreach ($roles as $roleId) {
        $role = Role::find($roleId);
        if ($role) {
            $user->assignRole($role->name);
        } else {
            return redirect()->back()->withErrors(['roles' => 'The selected role does not exist.']);
        }
    }
    
        $notification = array(
            'message' => 'New Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }//End Method

    public function DeleteAdmin($id){
        $user = User::findOrFail($id);
        if(!is_null($user)){
            $user->delete();
        }
        $notification = array(
            'message' => 'New Admin User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}