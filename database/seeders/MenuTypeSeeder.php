<?php

namespace Database\Seeders;

use App\Models\MenuType;
use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
              $menu_types_seed = [
            ["caption" => "menu_type" , "visible" => 1 ] ,
            ["caption" => "menu_type2" , "visible" => 1 ] ,
            ["caption" => "menu_type3" , "visible" => 1 ] ,
            ["caption" => "menu_type4" , "visible" => 1 ] ,
            ];


            foreach ($menu_types_seed as $menu_type) {
                
                $already_menu_type = MenuType::where("caption", $menu_type["caption"])->first();
                if($already_menu_type){
                    $already_menu_type->delete();
                }
                MenuType::create($menu_type);

            }

    }
}
