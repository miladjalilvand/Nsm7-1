<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    //
    protected $table = 'reserves';
    protected $fillable = [
        'total_time' , 
        'discount' , 
        'total_cost' , 
        'time' ,
        'date' , 
        'customer_id' , 
        'branch_id'
    ];
}
