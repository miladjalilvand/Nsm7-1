<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $table = 'branches';
    protected $filleble = [
        'caption',
        'phone',
        'mobile',
        'address',
        'location',
        'working_times','panel_id' , 'is_active'
    ];



}
