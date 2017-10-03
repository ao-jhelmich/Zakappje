<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;

class LeaderboardController  extends Controller
{
    public function index()
    {
    	
    	//Get all the ranks
			$ranks = DB::table('ranks')
			->select('ranks.rank_id', 'ranks.rank_name')
			->get();

    	//Get all the users
    	$users = DB::table('users')
    				->select('users.name', 'users.lastName', 'users.id', 'users.users_rank_id')
    				->get();

    	//Count the amount of mainrequirements for each user
    	foreach ($users as $user) {
    		$count = DB::table('user_has_mainrequirement')
    						->selectRaw('COUNT(user_id) as count')
    						->where('user_id', '=', $user->id)
  							->orderBy('count', 'desc')
    						->get();

    		$user->count = $count[0]->count;
    	}

    	//Sorts the users by the amount of mainrequirements
		$users = $users->sortByDesc('count');

        return view('zakappje.leaderboard')
        			->with('users', $users)
        			->with('ranks', $ranks);

    }

    public static function getUsersRequirements($user_id)
    {

		$mainrequirement_ids = DB::table('user_has_mainrequirement')
							->where('user_id', '=', $user_id)
							->select('user_id', 'mainrequirement_id')
							->get();
		if (isset($mainrequirement_ids[0])) {

			$i=0;
			foreach ($mainrequirement_ids as $mainrequirement_id) {
				$mainrequirement = DB::table('mainrequirements')
									->where('mainrequirements_id', '=', $mainrequirement_id->mainrequirement_id)
									->select('mainrequirements_name', 'mainrequirements_id')
									->get();
				$mainrequirements[$i] = $mainrequirement;
				$i++;
			}	
			return $mainrequirements;
		}

    }
}
