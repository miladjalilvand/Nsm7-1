<?php
namespace App\Livewire\Category;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    
    public $categories ;

    #[On('branch-switched')]
    public function mount(){

        $this->categories = 
        current_branch()->categories;
    }
        public function render()
    {
        return view("livewire.categories.index");
    }
};
