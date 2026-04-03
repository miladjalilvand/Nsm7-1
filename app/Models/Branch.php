<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $table = 'branches';
    protected $fillable = [
        'caption',
        'phone',
        'mobile',
        'address',
        'location',
        'working_times','panel_id' , 'is_active'
    ];

    public function services (){
        return $this->hasMany(Service::class);
    }

    public function categories (){
        return $this->hasMany(Category::class);
    }
    public function employees (){
        return $this->hasMany(Employee::class);
    }
    public function reserves (){
        return $this->hasMany(Reserve::class);
    }

}
