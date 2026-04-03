<?php
namespace App\Livewire\Service;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    public $services ; 

    //

    public function mount(){
        $this->services = current_branch()->services;
    }
        public function render()
    {
        return view("livewire.services.index");
    }
};
