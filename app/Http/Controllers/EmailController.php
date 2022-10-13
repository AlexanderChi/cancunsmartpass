<?php

namespace App\Http\Controllers;

use App\Mail\MailMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail($title, $subjetc, $body, $email, $name='', $admin=''){

        $formated_body = str_replace('{{$email}}', $email, $body);

        $credentials = [
            'title'=>$title,
            'subjetc'=>$subjetc,
            'body'=>$formated_body,
            'email'=>$email
        ];

        Mail::to($email)->send(new MailMaster($credentials));
    }
}
