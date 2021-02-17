<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    
    public function dashboard(){
        return view('admin.index');
    }

    public function login(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();

            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                Session::flash('error_message','Invalid Email or Password.');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
