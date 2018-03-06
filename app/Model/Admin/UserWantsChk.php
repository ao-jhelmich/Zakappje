<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class userWantsChk extends Model
{
    protected $table = 'user_want_checked';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'requirement_id', 
        'user_name',
        'requirement_name',
    ];
}
