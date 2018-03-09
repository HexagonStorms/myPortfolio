<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Mail;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

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
