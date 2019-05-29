<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Invite_Mail;
use App\Mail\Payment_Mail;

class test_mail extends Controller
{
    //
    public function test(){
        $email = "rrevodaniswara@yahoo.com";
        $data = [
            "sender_name" => "test_name",
            "message" => "test_message",
            "content" => "test_content"
            ];
        Mail::to($email)->send(new Invite_Mail($data));
    }
}
