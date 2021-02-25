<?php

namespace App;
class SendCode
{
    public static function sendCode($phone){
        $code = rand(1111,9999);
        $nexmo=app('Nexmo\Client');
        $nexmo->message()->send([
            'to'=>'+91'.(int) $phone,
            'from'=> 'Anirban',
            'text'=> 'Your verification code is : '.$code, 
        ]);
        return $code;
    }
}