<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Model\Book\Mainrequirements;
use App\Mode\User\User;

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

    public static function getUsersRequirements($user_id, $rank_id)
    {

        $allMainrequirements = DB::table('mainrequirements')
                                ->where('mainrequirements.mainrequirements_rank_id', '=', $rank_id)
                                ->select('*')
                                ->get();

        $i=0;
        foreach ($allMainrequirements as $mainrequirement) {

            $result = DB::table('requirements')
                            ->join('user_has_requirement', 'requirements.requirements_id', '=', 'user_has_requirement.requirement_id')
                            ->where('user_has_requirement.user_id', '=', $user_id)
                            ->where('requirements.requirements_mainrequirements_id', '=', $mainrequirement->mainrequirements_id)
                            ->select('*')
                            ->get();
            if (isset($result[0])) {
            
            $array[$i]['mainrequirement'] = $mainrequirement;
            $array[$i]['requirement'] = $result;

            $i++;
        }

        }
            if (isset($array)) {
                return($array);
            }
	}
}
