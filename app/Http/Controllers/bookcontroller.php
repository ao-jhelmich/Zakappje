<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requirements;

class bookcontroller extends Controller
{
    public function index()
    {
        $requirements = requirements::all();

        
        return View('zakappje.books')
            ->with('requirements', $requirements);
    }
}
