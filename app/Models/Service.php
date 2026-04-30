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


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function employees(){
        return $this->belongsToMany(
            Employee::class,
            'employee_services' , 
            'service_id' ,
            'employee_id',

        );
    }
}
