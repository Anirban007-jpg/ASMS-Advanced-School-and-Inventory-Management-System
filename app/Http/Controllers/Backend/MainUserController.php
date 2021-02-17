<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class MainUserController extends Controller
{
    //

    public function UserView(){
        //dd('view user');
        $data['alldata'] = User::all();
        $data['alladmindata'] = Admin::all();
        return view('backend.admin.view_user', $data);
    }
}
