<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirements;
use App\mainrequirements;
use App\Ranks;
use App\Instructions;
use App\userWantsChk;
use Redirect;
use DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {   

    	$requirements = Requirements::all();
        return View('zakappje.books')
        	->with('requirements', $requirements);
    }

    public function show(Request $request, Requirements $requirement)
    {
    	$mainrequirement = mainrequirements::find($requirement->requirements_mainrequirements_id);
    	$rank = Ranks::find($mainrequirement->mainrequirements_rank_id);
    	$instructions = Instructions::select('instructions.*')
    									->where('instructions.instructions_requirements_id', '=', $requirement->requirements_id)->get();

    	$userid = Auth::user()->id;

        //Check if the user already has that requirement
        $userHasRequirement = DB::table('user_has_requirement')->where('user_id', $userid)->where('requirement_id',$requirement->requirements_id)->get();
        
        $inrow = true;

        if (isset($userHasRequirement)) {
            foreach ($userHasRequirement as $key => $value) {
                if ($value->requirement_id == $requirement->requirements_id) {
                    $inrow = false; 
                }
            }
        }

    if($inrow == true){
        //Check if the requirement is in the user wants checked db
        $userWantsChecked = DB::table('user_want_checked')->where('user_id', $userid)->where('requirement_id',$requirement->requirements_id)->get();
        
        //The value that is given to the homepage to make it show or not show

        //check if the db entry is the entry about the requirement
    	if (isset($userWantsChecked)) {
    		foreach ($userWantsChecked as $key => $value) {
    			if ($value->requirement_id == $requirement->requirements_id) {
    				$inrow = false; 
    			}
    		}
    	}
    }

    		return View('zakappje.books', ['requirement' => $requirement, 'instructions' => $instructions, 'mainrequirement' => $mainrequirement, 'rank' => $rank, 'inrow' => $inrow,]);	
    }
   
}