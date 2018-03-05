<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Mail;
use Response;

class MainController extends Controller
{
    public function sendEmail(Request $request)
    {
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('plazajosue2@gmail.com');
            $message->from($request->email, $request->name);
            $message->subject('Message from your portfolio website');
        });

        return Response::json(true);
    }
}
