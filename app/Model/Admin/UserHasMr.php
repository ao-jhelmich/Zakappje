<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserHasMr extends Model
{
    protected $table = 'user_has_mainrequirement';

    protected $primaryKey = 'user_id';
}
