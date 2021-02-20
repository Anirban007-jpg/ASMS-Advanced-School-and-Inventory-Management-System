<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Mail;
use App\Http\Controllers\Backend\MailController;
use sha1;
use Auth;

class EmailController extends Controller
{
    //
    public function VerifyEmail(){

        $id = Auth('admin')->user()->id;
        $admin = Admin::find($id);

        return view('backend.admin.mail.verify_email', compact('admin'));

    }

    
    public function SendEmail(Request $request){
        
        if ($request->usertype == 'Student' || $request->usertype == 'Customer'){
            $user = User::where('email', $request->email)->first();
            
            $user->email_verification_code = sha1(time());
            $user->save();

            if ($user != NULL){
                MailController::EmailData($user->name, $user->email, $user->email_verification_code);
                $notification = array(
                    'message' => 'User Mail sent successfully',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('verify.email')->with($notification);
            }
            else {
                dd('mail not sent');
            }
        }

        else if ($request->usertype == 'Super-Admin'){
            $admin = Admin::where('email', $request->email)->first();
            
            
            $admin->email_verification_code = sha1(time());
            $admin->save();

            if ($admin != NULL){
                MailController::EmailData($admin->name, $admin->email, $admin->email_verification_code);
                $notification = array(
                    'message' => 'User Mail sent successfully',
                    'alert-type' => 'success'
                );
    
                return redirect()->route('verify.email')->with($notification);
            }
            else {
                dd('mail not sent');
            }
        }
        else {
            $notification = array(
                'message' => 'User Mail not sent successfully',
                'alert-type' => 'error'
            );

            return redirect()->route('verify.email')->with($notification);
            
        }

        //dd(env('MAIL_USERNAME')); 
        

    }


    public function VerifyUser(Request $request){
        return view('backend.admin.verify_user');
    }

    public function VerifiedUser(Request $request){
        $validatedData = $request->validate([
            'verificationcode' => 'required',
        ]);

        $id = Auth('admin')->user()->id;
        $admin = Admin::find($id);
        if ($admin->email_verification_code == $request->verificationcode){
            $admin->is_email_verified = 1;
            $admin->save();
            $notification = array(
                    'message' => 'User EMail verified successfully',
                    'alert-type' => 'success'
            );

            return redirect()->route('admin.dashboard')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'User Verification code does not match',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
    
    // public function VerifyUser(Request $request){
    //     $verification_code = \Illuminate\Support\Facades\Request::get('code');
    //     dd($verification_code);
    //     $user = User::where(['email_verification_code' => $verification_code])->first();
    //     $admin = Admin::where(['email_verification_code' => $verification_code])->first();
    //     if ($admin != null){
    //         $admin->is_email_verified = 1;
    //         $admin->save();
    //         $notification = array(
    //             'message' => 'User Mail verified successfully',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('')->with($notification);
    //     }
    // }
}
