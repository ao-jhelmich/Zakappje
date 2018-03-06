<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserHasMr extends Model
{
    protected $table = 'user_has_mainrequirement';

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'mainrequirement_id', 
        'user_has_mainrequirement_rank_id',
    ];
}
