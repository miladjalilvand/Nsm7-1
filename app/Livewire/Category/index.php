<?php
namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]

 class Index extends Component
{
    
    public $categories ;

    public $current_branch ;

    public $caption ;
    public $showModal ;


    public $current_category;
    public $edit_mode = false;

    
    #[On(['branch-switched'])]
    public function refresh(){
        //   dd('refresh called');

              $this->current_branch = current_branch()->fresh(); // IMPORTANT


        $this->categories = 
        $this->current_branch->categories;    }
    public function mount(){
        $this->current_branch =  current_branch();
        $this->categories = 
        $this->current_branch->categories;
    }
        public function render()
    {
        return view("livewire.categories.index");
    }

    public function store(){

        

        if(!$this->edit_mode){
        Category::create([
        'branch_id'=>$this->current_branch->id ,
        'caption' => $this->caption , 
        
        ]);}
        else {
           
            $this->current_category->update([
                        'branch_id'=>$this->current_branch->id ,
        'caption' => $this->caption , 
            ]);
        }

        
              $this->current_branch = current_branch()->fresh(); // IMPORTANT


        $this->categories = 
        $this->current_branch->categories;
        $this->showModal = false ; 

        // $this->dispatch('category-created');

    }


    public function show_edit($category){
      $this->edit_mode = true ;
      $this->showModal = true;

$this->current_category =Category::find($category['id']);

      $this->caption= $category['caption'];

    }
    
};
