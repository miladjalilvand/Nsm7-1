<?php

use App\Models\Branch;
use App\Models\MenuType;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    //
    public $menus , $menuTypes ;

    public $show_menu ;

  

 public  $branchesCount ; 
 public function mount()
{
    $this->menuTypes = MenuType::with('menus')->get();

    $this->branchesCount = Branch::count();

    $this->show_menu = app('show-menu-all');
}

};
?>

<div>

{{$show_menu ? 'true' : 'false'}}
@foreach($menuTypes as $menuType)
    <span class=" font-semibold">
        {{ $menuType->caption }}
</sapn>


    @foreach($menuType->menus as $menu)
    @if($menu->slug == 'branches' || $branchesCount)
        <flux:sidebar.item
       
            :href="route($menu->slug.'.index')"

            :current="request()->is('/'.$menu->slug)"
            wire:navigate
            icon="{{$menu->icon}}"
        >
            {{ $menu->caption }}
        </flux:sidebar.item>
        @endif
    @endforeach

@endforeach

</div>

<!-- :href="url('/'.$menu->slug)"  -->