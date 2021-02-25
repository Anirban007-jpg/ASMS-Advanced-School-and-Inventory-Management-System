<?php

namespace App\Http\Controllers\Backend;

// require __DIR__ . '/vendor/autoload.php';

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Admin;
use App\Models\User;
use App\Models\Sms;
use App\SendCode;
use Auth;
use Nexmo;

class PhoneController extends Controller
{
    //
    public function VerifyPhone(){
        return view('backend.admin.Phone.verify_phone');
    }

    public function SendPhone(Request $request){
        
        $mobile = $request->mobile;
        $user = User::where('mobile', $mobile)->first();
        if ($user != NULL){
            $user->code = SendCode::sendCode($mobile);
            $user->save();
            $notification = array(
                'message' => 'Verifcation mail sent successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        } 
        else{

            $notification = array(
                'message' => 'Phone number does not exsist',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }   
    }
}
