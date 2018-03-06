<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserHasRan extends Model
{
    protected $table = 'user_has_rank';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'rank_id', 
    ];
}
