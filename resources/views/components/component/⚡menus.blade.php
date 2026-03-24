<?php


use App\Models\MenuType;
use Livewire\Component;

new class extends Component
{
    //
    public $menus , $menuTypes ;

public function mount()
{
    $this->menuTypes = MenuType::with('menus')->get();
}

};
?>

<div>


@foreach($menuTypes as $menuType)
    <span class=" font-semibold">
        {{ $menuType->caption }}
</sapn>


    @foreach($menuType->menus as $menu)
        <flux:sidebar.item
       
            :href="route($menu->slug.'.index')"

            :current="request()->is('/'.$menu->slug)"
            wire:navigate
            icon="{{$menu->icon}}"
        >
            {{ $menu->caption }}
        </flux:sidebar.item>
    @endforeach
@endforeach

</div>

<!-- :href="url('/'.$menu->slug)"  -->