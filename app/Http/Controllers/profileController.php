<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class profileController extends Controller
{
    public function index($id)
    {
    	$profileResult = User::find($id);
    	return view('profile.index', ['profile' => $profileResult]);
    }

}
