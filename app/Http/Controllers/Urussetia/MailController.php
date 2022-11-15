<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;



class MailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('urussetia.email.betafeedback');
    }


    public function sendfeedback(Request $request)
    {
        $subject = 'Beta Testing Feedback';

        $msg = $request->get('feedback');

        $from = Auth::user()->email;

        $html = '<h1>Beta Testing Feedback</h1><br>'.$msg;

        Mail::send([], [], function ($message) use ($html, $subject, $from, $msg) {
            $message->to('user@somedomain.com','Beta Testing Feedback')
            ->subject($subject)
            ->from($from)
            ->setBody($html, 'text/html');


        });


     }


    }