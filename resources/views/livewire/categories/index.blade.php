<div>
    <livewire:branch_switcher />

<livewire:component.create_button_section />

{{$categories->count()}}
   <flux:modal name="categories" :show="$errors->isNotEmpty()" focusable class="max-w-lg"
    wire:model="showModal"
   >
                    <form wire:submit="store" 
            class=""
            >
        <flux:input
    label="عنوان"
    placeholder="کپشن را وارد کنید"
    type="text"
    wire:model="caption"
    :error="$errors->first('caption')"
/>


                      
                    <flux:button  type="submit" variant="filled">
                    {{ __('ذخیره') }}
                
                </flux:button>
             
        </form>
    </flux:modal>

    @foreach($categories as $category)

                    <div class="flex flex-col">
    <div class="flex flex-col m-1 p-3">

    <div>         <span>
          عنوان:  {{$category->caption}}
        </span><br/>
        
        <div class="text-left">
 <flux:modal.trigger name="categories">
        <flux:button variant="primary"
        wire:click="show_edit({{$category}})" >
         
           
                ویرایش
            
        </flux:button>
    </flux:modal.trigger>
        </div>
            </div>    </div>

        @endforeach

</div>