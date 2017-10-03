<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastName', 'birth_day_year', 'birth_day_month', 'birth_day_day', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRole($role)
    {
        return User::where('accountRole', $role)->get();
    }

    public function rank_id()
    {
        $id = Auth::user()->id;
        return User::where('users_rank_id', $id)->get();
    }
}
