<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ["is_active" , "caption"];
    protected $table = "categories"; 

    public function faqs () {
        return $this->hasMany(Faq::class);
    }
}
