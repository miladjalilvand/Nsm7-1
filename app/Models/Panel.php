<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    //
    protected $table = 'panels' ; 

    protected $fillable = ['id','website' , 'expired_date' , 'user_id'];

    public function branches ()
    {
        return $this->hasMany(Branch::class);
    }
    
}
