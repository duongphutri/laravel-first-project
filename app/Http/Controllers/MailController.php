<?php

namespace App\Http\Controllers;

use App\Mail\NewMailtrap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($name, $mail, $subject, $message)
    {
        Mail::to('duongphutri@gmail.com')->send(new NewMailtrap($name, $mail, $subject, $message));
        return redirect()->route('contact');
    }
}
