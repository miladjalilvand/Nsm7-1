<?php
namespace App\Livewire\Branch;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    //
    public $branches ;



    // #[On('branch-created')]
    public function refresh(){
        //   dd('refresh called');

          $user = Auth::user();
        $this->branches = $user->admin->panel->branches;
    }


    public function mount()
    {
        $user = Auth::user();
        $this->branches = $user->admin->panel->branches;
    }



    public function render()
    {
        return view("livewire.branches.index");
    }
};
