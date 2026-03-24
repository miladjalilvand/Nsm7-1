<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    //
    protected $table = 'panels' ; 

    protected $fillable = ['website' , 'expired_date' , 'user_id'];
}
