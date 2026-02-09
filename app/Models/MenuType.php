<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuType extends Model
{
    //
    protected $fillable = ["visible" , "caption" ];
    protected $table = "menu_types"; 

    public function menus () {
        return $this->hasMany(Menu::class);
    }
}
