<?php
namespace App\Livewire\Employee;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    //
        public $employees ;

    public function mount(){
        $this->employees = 
        current_branch()->employees;
    }
        public function render()
    {
        return view("livewire.employees.index");
    }
};
