<?php
namespace App\Livewire\Branch;

use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    //
    public $branches ;

    public $showModal ;

    public $caption ,$phone , $mobile , $address , $location , $working_times ;


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

    public function store()
    {
        $user = Auth::user();
               Branch::create([
            'caption'=> $this->caption , 
           'phone'=> $this->phone , 
            'mobile'=>$this->mobile , 
           'location'=> $this->location , 
           'address'=> $this->address ,
          'working_times'=>  $this->working_times, 
          'panel_id' => panelID($user)
        ]);

      $user = Auth::user();
        $this->branches = $user->admin->panel->branches;
        $this->showModal = false ; 
                // $this->dispatch('branch-created');
        // $this->reset();


        // $this->dispatch('delete-user-button');
    }
    
};
