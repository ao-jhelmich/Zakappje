<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Book\Mainrequirements;

class HomeController extends Controller
{
    public function index()
    {
    	$MainrequirementOfTheDay = Mainrequirements::where('ModFlag', 2)->get();
        return view('home', compact('MainrequirementOfTheDay'));
    }

    public function uitlegIndex()
    {
    	return view('uitleg.uitleg');
    }
}
