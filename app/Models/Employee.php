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
}
