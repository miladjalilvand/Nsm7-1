<?php

use App\Models\Admin;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

if(!function_exists('getPersianModuleCaptions'))
{
    function getPersianModuleCaptions($slug) : string{
        $persianCaption = match($slug)
        {
            'branches' => 'شعبه ها',
            'categories' => 'دسته بندی ها',
            'services' => 'سرویس ها' , 
            'employees' => 'کارمندان',
            'reserves' => 'نوبت ها'
        };

        return $persianCaption;
    }

}

if(!function_exists('getPersianModuleCaptionButtons'))
{
     function getPersianModuleCaptionCreateButtons($slug) : string{
        $persianCaption = match($slug)
        {
            'branches' => 'شعبه جدید',
            'categories' => 'دسته بندی جدید',
            'services' => 'سرویس جدید' , 
            'employees' => 'کارمند جدید',
            'reserves' => 'نوبت ها'
        };

        return $persianCaption;
    }
}


if(!function_exists('panelID'))
{
    function panelID(User $user){

       return $user->admin->panel->id;
    }
}


if(!function_exists('userAUTH')){

    function userAUTH(){
        $user = Auth::user();
        return $user;
    }
}


if(!function_exists('set_first_branch')){

    function set_first_branch(Admin $admin){
        $branch =  $admin->panel->branches->first();
        session(['current_branch' => $branch]);

    }

}


if(!function_exists('current_branch')){

    function current_branch() :Branch {
        return session('current_branch')?? Auth::user()->admin->panel->branches->first();
        
    }

}


if(!function_exists('set_current_branch')){

    function set_current_branch(Branch $branch){
        session(['current_branch' => $branch]);
    }

}