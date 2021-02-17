<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //

    public function dashboard(){
        return view('user.index');
    }


    public function login(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
            if (Auth::guard('web')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                //echo "Yes";
                return redirect('user/dashboard');
            }else{
                //echo "no";
                //Session::flash('error_message','Invalid Email or Password.');
                return redirect()->back();
            }
        }
        return view('user.user_login');
    }
}
