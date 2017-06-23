<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;

class LeaderboardController  extends Controller
{
    public function index()
    {

    	$users = DB::table('users')
    				->select('users.name', 'users.lastName', 'users.id', 'users.users_rank_id')
    				->get();

    	$ranks = DB::table('ranks')
    				->select('ranks.rank_id', 'ranks.rank_name')
    				->get();

    	



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
				$requirements[$i] = $requirement;
				$i++;
			}
		 return $requirements;
		}

    }
}
