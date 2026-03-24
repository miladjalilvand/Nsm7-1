<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';
    protected $filleble = [
        'working_times',
        'caption' , 
        'name' , 
        'status_id' ,
        'branch_id' , 'is_active'
    ];
}
