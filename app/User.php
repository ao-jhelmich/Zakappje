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
        'name', 'email', 'password', 'lastName', 'streetAdress', 'houseNumber', 'city', 
        'postal_code', 'birth_day_year', 'user_phone_number',  'birth_day_month', 'birth_day_day', 'user_parent_name', 
        'user_parent_email', 'user_parent_phone',
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
}
