<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function getMailPage() {
        return view('emails.mail');
    }

    // Email versturen

    public function sendEmailWelcome()
    {
        $data = [
            'title'=>'title here',
            'content'=>'simple content',
            'database'=>'img/database.png'
        ];
    
        Mail::send('emails.welcome',$data, function ($message){
    
            $message->to('yoram.platteeuw@telenet.be', 'Yoram');
            $message->subject('Welcome!');
            $message->from('welcome@sandboxc2b0a7b7b7f04450a6f1fe028cf7fdd7.mailgun.org');
        });
    
    return redirect('mail');
    }
}
