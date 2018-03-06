<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'lastName', 
        'birth_day_year', 
        'birth_day_month', 
        'birth_day_day', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasInCheck($userId)
    {
        //get the user id
        
        //search the user wants checked db
        //if not in row for checking check if user already has requirement.
        return User::where('users_rank_id', $userId)->get();
    }

    public function rank_id()
    {
        $id = Auth::user()->id;
        return User::where('users_rank_id', $id)->get();
    }
}
