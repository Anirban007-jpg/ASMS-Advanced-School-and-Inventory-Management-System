<?php

namespace App\Http\Controllers\Backend;

// require __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Admin;
use Auth;
use Nexmo;

class PhoneController extends Controller
{
    //
    public function VerifyPhone(){
        return view('backend.admin.Phone.verify_phone');
    }

    public function SendPhone(Request $request){
     
    }
}
