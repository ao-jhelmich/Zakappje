<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirements;

class bookcontroller extends Controller
{
    public function index()
    {
        $requirements = Requirements::all();

        
        return View('zakappje.books')
            ->with('requirements', $requirements);
    }
}
