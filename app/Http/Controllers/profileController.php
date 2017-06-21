<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class profileController extends Controller
{
    public function index($id)
    {
    	$profile = User::find($id);
    	return view('profile.index');
    }

}
