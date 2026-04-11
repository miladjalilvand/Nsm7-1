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

</div>