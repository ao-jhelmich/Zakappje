<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirements;
use Redirect;

class bookcontroller extends Controller
{
    public function index()
    {        
    	$requirements = Requirements::all();
        return View('zakappje.books')
        	->with('requirements', $requirements);
    }

    public function show()
    {
    	$name = $_POST['name'];
    	return View('zakappje.books')
    		->with('name', $name);
    }
   
}
