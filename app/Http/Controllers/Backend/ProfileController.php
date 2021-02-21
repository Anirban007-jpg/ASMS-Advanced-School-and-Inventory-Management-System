<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Hash;

class ProfileController extends Controller
{
    //
    public function AdminProfileView(){
        $id = Auth('admin')->user()->id;
        $admin = Admin::find($id);
        //dd($user);

        return view('backend.admin.view_profile', compact('admin'));
    }

    public function AdminProfileEdit(){
        $id = Auth('admin')->user()->id;
        $admin = Admin::find($id);
        
        //dd($admin);
        
        return view('backend.admin.edit_profile', compact('admin'));
    }

    public function AdminProfileUpdate(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'mobile' => 'required|max:11|min:10',
            'address' => 'required',
            'image' => 'required',
            ]);

        $data = Admin::find(Auth('admin')->user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/admin_image'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordChange(){
        $id = Auth('admin')->user()->id;
        $admin = Admin::find($id);
        
        return view('backend.admin.edit_password', compact('admin'));
    }

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth('admin')->user()->password;
        //dd($hashedPassword);
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(Auth('admin')->id());
            $admin->password = Hash::make($request->password);
            //dd($admin_password);
            $admin->save();
            Auth::guard('admin')->logout();
            return redirect('/admin/login');
        }else{
            $notification = array(
                'message' => 'User Current Password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
