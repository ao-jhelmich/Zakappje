<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;

class LeaderboardController  extends Controller
{
    public function index()
    {

    	$users = DB::table('users')
    				->select('users.name', 'users.lastName', 'users.users_rank_id')
    				->get();

    	$ranks = DB::table('ranks')
    				->select('ranks.rank_id', 'ranks.rank_name')
    				->get();



        return view('zakappje.leaderboard')
        			->with('users', $users)
        			->with('ranks', $ranks);
    }
}
