<?php 

namespace App\Model\Book;

use Illuminate\Database\Eloquent\Model;

class Ranks extends Model
{
    protected $primaryKey = 'rank_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rank_name', 
    ];

    public function mainrequirements()
    {
        return $this->hasMany(Mainrequirements::class);
    }
}