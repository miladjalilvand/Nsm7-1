<?php

use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    //
    public Branch $current_branch ;

    public $t ;

    public function mount()
    {
        
        // dd(Auth::user()->admin->panel->branches->first());
        // set_current_branch(Auth::user()->admin->panel->branches->first());

        $this->t = 'a';
        $this->current_branch = current_branch();
    }

    public function branch_switcher(){
        
        if(current_branch() == Auth::user()->admin->panel->branches->last() || 
        $this->t=='c'){
            $this->t='b';
      set_current_branch(Auth::user()->admin->panel->branches->first()) ;
        }else {   set_current_branch( Auth::user()->admin->panel->branches->last());
            $this->t='c';
        
        }


    // dd(current_branch());
        $this->current_branch = current_branch();

        $this->dispatch('branch-switched');

        
    }
};
?>

<div>
    {{-- Simplicity is the essence of happiness. - Cedric Bledsoe --}}
    {{$this->current_branch->caption}}
    {{$t}}
    <button wire:click="branch_switcher">
switch
    </button>
</div>