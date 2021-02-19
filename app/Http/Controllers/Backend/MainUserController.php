<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use bcrypt;

class MainUserController extends Controller
{
    //

    public function UserView(){
        //dd('view user');
        $data['alldata'] = User::all();
        $data['alladmindata'] = Admin::all();
        return view('backend.admin.view_user', $data);
    }

    public function UserAdd(){
        return view('backend.admin.add_user');
    }

    public function UserStore(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'name' => 'required',
            'mobile' => 'required|max:11|min:10',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);

        if ($request->usertype == "Student" || $request->usertype == "Customer"){
            $data = new User();
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            $data->gender = $request->gender;
            $data->password = bcrypt($request->password);
            $data->save();

            $notification = array(
                'message' => 'User Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('user.view')->with($notification);
        }
        else if ($request->usertype == "Admin" || $request->usertype == "Super-Admin"){
            $data = new Admin();
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            $data->gender = $request->gender;
            $data->password = bcrypt($request->password);
            $data->save();
            $notification = array(
                'message' => 'User Inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user.view')->with($notification);
        }
    }

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.admin.edit_user', compact('editData'));
    }

    public function AdminEdit($id){
        $editData = Admin::find($id);
        return view('backend.admin.edit_admin', compact('editData'));
    }

    public function UserUpdate($id, Request $request){

            $data = User::find($id);
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            $data->gender = $request->gender;
            $data->save();

            $notification = array(
                'message' => 'User Updated successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('user.view')->with($notification);
    }

    public function AdminUpdate($id, Request $request){

        $data = Admin::find($id);
        
        $data->usertype = $request->usertype;
        $data->email = $request->email;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->save();

        $notification = array(
            'message' => 'User Updated successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User deleted successfully',
            'alert-type' => 'danger'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function AdminDelete($id){
        $user = Admin::find($id);
        $user->delete();
        $notification = array(
            'message' => 'User deleted successfully',
            'alert-type' => 'danger'
        );

        return redirect()->route('user.view')->with($notification);
    }


}
