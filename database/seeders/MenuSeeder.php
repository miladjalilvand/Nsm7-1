<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                $menus_seed = [
            ["caption" => "menu" , "visible" => 1 , "menu_type_id" => 1] ,
            ["caption" => "menu2" , "visible" => 1 ,"menu_type_id"  => 1 ] ,
            ["caption" => "menu3" , "visible" => 1 ,"menu_type_id"  => 1 ] ,
            ["caption" => "menu4" , "visible" => 1 ,"menu_type_id"  => 1 ] ,
            ];


            foreach ($menus_seed as $menu) {
                
                $already_menu = Menu::where("caption", $menu["caption"])->first();
                if($already_menu){
                    $already_menu->delete();
                }
                Menu::create($menu);

            }
    }
}
