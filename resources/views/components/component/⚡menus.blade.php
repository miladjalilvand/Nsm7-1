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
    <div class="mb-2 font-bold">
        {{ $menuType->caption }}
    </div>

    @foreach($menuType->menus as $menu)
        <flux:sidebar.item
            :href="url('/'.$menu->slug)"
            :current="request()->is('/'.$menu->slug)"
            wire:navigate
        >
            {{ $menu->caption }}
        </flux:sidebar.item>
    @endforeach
@endforeach

</div>