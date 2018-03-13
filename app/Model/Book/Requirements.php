<?php 

namespace App\Model\Book;

use Illuminate\Database\Eloquent\Model;

class requirements extends Model
{
    protected $primaryKey = 'requirements_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requirements_name', 
        'requirements_mainrequirements_id', 
        'flag',
    ];
}