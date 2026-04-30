<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    //
    protected $table = 'reserves';
    protected $fillable = [
        'total_time' , 
        'discount' , 
        'total_cost' , 
        'end_time' ,
        'start_time' , 
        'customer_id' , 
        'branch_id' , 
        'status_id'
    ];


    public function scopePendingReseerves(){

    }

    public function scopeSubmittedReseerves(){
        
    }
    public function scopeFutureReseerves(){
        
    }
    public function scopePastReseerves(){
        
    }
    public function scopeTodayReseerves(){
        
    }
    public function scopeUserReseerves(){
        
    }

    public function changeStatus(){
        
    }
}
