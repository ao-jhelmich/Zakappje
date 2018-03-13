<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Book\Mainrequirements;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $mainrequirementOfTheDay = Mainrequirements::where('ModFlag', 2)->get();
        
        return view('home', compact('mainrequirementOfTheDay'));
    }

    public function uitlegIndex()
    {
    	return view('uitleg.uitleg');
    }
}
