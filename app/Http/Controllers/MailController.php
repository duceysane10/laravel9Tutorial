<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendmail(){
        $details=[
            'title' => 'hello abdifitah from larvel',
            'body' => 'Testing sendig email from laravel'
        ];
        Mail::to('engduceysane10@gmail.com')->send(new TestMail($details));
        return 'Email sent';
    }
}
