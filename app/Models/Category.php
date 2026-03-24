<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $filleble = [
        'branch_id' ,
        'caption' , 'is_active'
    ];
}
