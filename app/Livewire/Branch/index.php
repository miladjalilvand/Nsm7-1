<?php
namespace App\Livewire\Branch;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    //
        public function render()
    {
        return view("livewire.branches.index");
    }
};
