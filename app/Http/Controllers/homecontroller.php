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
        $mrName = '';

        foreach ($mainrequirementOfTheDay as $key => $value) {
         if ($value->mainrequirements_rank_id == Auth::user()->users_rank_id OR $value->mainrequirements_rank_id == 4) {
              $mrName = $value->mainrequirements_name;
           }  
        }
        
        return view('home', compact('mainrequirementOfTheDay', 'mrName'));
    }

    public function uitlegIndex()
    {
    	return view('uitleg.uitleg');
    }
}
