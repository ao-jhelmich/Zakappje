<?php namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
     public function send(){
        Mail::to('jasper.helmich@gmail.com')->send('emails.send');

        return response()->json(['message' => 'Request completed']);
    }        
}
