<?php 

namespace App\Model\Book;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $primaryKey = 'instructions_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'instructions_name', 
        'instructions_desc', 
        'instructions_requirements_id',
        'flag',
    ];
}