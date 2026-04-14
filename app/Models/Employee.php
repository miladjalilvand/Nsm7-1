<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';
    protected $fillable  = [
        'working_times',
        'caption' , 
        'name' , 
        'branch_id' , 'is_active'
    ];


    public function employee_services(){
        return $this->hasMany(EmployeeService::class);
    }

    public function services(){
    return $this->belongsToMany(
        Service::class,
        'employee_services',
        'employee_id',  // FK در pivot که به Employee اشاره می‌کند
        'service_id'    // FK در pivot که به Service اشاره می‌کند
    );    }
}
