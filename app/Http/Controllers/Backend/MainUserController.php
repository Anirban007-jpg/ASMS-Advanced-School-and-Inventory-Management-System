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
            'password' => 'required'
        ]);

        if ($request->usertype == "Student"){
            $data = new User();
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect()->route('user.view');
        }
        else if ($request->usertype == "Admin" || $request->usertype == "Super-Admin"){
            $data = new Admin();
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect()->route('user.view');
        }

    }
}
