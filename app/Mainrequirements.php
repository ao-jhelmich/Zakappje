<?php namespace App;

use Illuminate\Database\Eloquent\Model;

    class mainrequirements extends Model
    {
    	 protected $primaryKey = 'mainrequirements_id';

    	 protected $fillable = ['mainrequirements_name', 'mainrequirements_description', 'flag', 'mainrequirements_rank_id', 'ModFlag'];
    }