<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use DB;

class profileController extends Controller
{
    public function index($id)
    {	
    	$book = 
    		DB::table('ranks')
  			->select('ranks.*', 'mainrequirements.*', 'requirements.*')
            ->leftJoin('mainrequirements', 'ranks.rank_id', '=', 'mainrequirements.mainrequirements_rank_id')
            ->leftJoin('requirements', 'mainrequirements.mainrequirements_id', '=', 'requirements.requirements_mainrequirements_id')
            ->orderby('rank_id')
            ->get();

            $curclass = 0;
  $curmr = 0;
  $curr = 0;
    	$profileResult = User::find($id);
    	return view('profile.index', [
    		'profile' => $profileResult, 
    		'books' => $book, 
    		'curclass' => 0, 
    		'curmr' => 0, 
    		'curr' => 0]);
    }

}
