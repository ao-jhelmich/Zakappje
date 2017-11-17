<?php namespace App\Mail\Controllers;

use App\Order;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function ship()
    {
        Mail::to('jasper.helmich@gmail.com')->send(new TestMail());
    }
}

