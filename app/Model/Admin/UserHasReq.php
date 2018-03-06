<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserHasReq extends Model
{
    protected $table = 'user_has_requirement';

    protected $primaryKey = 'user_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'requirement_id', 
        'user_has_requirement_mainrequirement_id',
    ];
}
