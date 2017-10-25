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
    		$count = DB::table('user_has_requirement')
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

        $requirement_ids = DB::table('user_has_requirement')
                            ->where('user_id', '=', $user_id)
                            ->select('user_id', 'requirement_id')
                            ->get();

        if (isset($requirement_ids[0])) {

            $i=0;
            foreach ($requirement_ids as $requirement_id) {
                $requirement = DB::table('requirements')
                                    ->where('requirements_id', '=', $requirement_id->requirement_id)
                                    ->select('requirements_name', 'requirements_id')
                                    ->get();
                $requirements[$i]['name'] = $requirement[0]->requirements_name;
                $requirements[$i]['id'] = $requirement[0]->requirements_id;
                $i++;
            }
            //dd($requirements);
            return($requirements);


		}

    }
}
