<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'services';
    protected $fillable  = [
        'description',
        'cost' , 
        'discount' , 
        'time' ,
        'caption' ,
        'category_id' ,
        'branch_id' ,'is_active'
    ];
}
