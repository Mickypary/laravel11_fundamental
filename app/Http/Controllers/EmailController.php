<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        // $user = User::First();
        $subject = 'This is a test email';
        $body = 'Hello, this is a test email from Mickypary. Thank you!';

        // \Mail::to('mikipary@gmail.com')->send(new Websitemail($subject, $body));

        // echo 'Email sent';

        try {
            Mail::to('mikipary@gmail.com')->send(new Websitemail($subject, $body));
            // Mail::to($user->email)->send(new WelcomeEmail($user));
            // Optionally, you can check if the email was sent successfully

            // Email sent successfully
            echo 'Email sent successfully';
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
