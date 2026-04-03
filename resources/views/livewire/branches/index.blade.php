<div>
<livewire:component.create_button_section />
{{$branches->count()}}

<flix:button wire:submit.prevent="open modal"  >
    open modal
</flix:button>

<flux:modal name="">

</flux:modal>
</div>