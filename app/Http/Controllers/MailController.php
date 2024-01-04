<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    //
    public function index(){
        $data = [
            'subject' => 'Successfully registered in our website with email address',
            'body' => 'Your email address has been successfully registed in our website notification!!!!'
        ];
        try{
                Mail::to('datnd.22git@vku.udn.vn')->send(new MailNotify($data));
                return response()->json(['Check your mailbox']);
        }catch(Exception $e){
          return response()->json(['Wrond email address']);
        }
    }
}
