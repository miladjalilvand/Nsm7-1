<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'services';
    protected $filleble = [
        'description',
        'cost' , 
        'discount' , 
        'time' ,
        'caption' ,
        'status_id' ,
        'category_id' ,
        'branch_id' ,'is_active'
    ];
}
