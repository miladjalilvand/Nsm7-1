<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeService extends Model
{
    //
    protected $table ='employee_services'; 
    protected $fillable = [ 'employee_id' , 'service_id' , 'is_active'];

    public function services (){
        return $this->hasMany(Service::class);
    }
}
