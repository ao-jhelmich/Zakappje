<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasReq extends Model
{
    protected $table = 'user_has_requirement';

    protected $primaryKey = 'user_id';
}
