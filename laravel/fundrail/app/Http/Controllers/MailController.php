<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\User;
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

    public function sendEmailWelcome()
    {
        $data = [
            'title'=>'title here',
            'content'=>'simple content'
        ];
    
        Mail::send('emails.welcome',$data, function ($message){
    
            $message->to('yoram.platteeuw@telenet.be', 'Yoram');
            $message->subject('Welcome!');
            $message->from('fundrail.com');
        });
    
    return redirect('mail');
    }
}
