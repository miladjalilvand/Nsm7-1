<?php

use Livewire\Component;

new class extends Component
{
    //
    public $segment ;
    public $persianCaptionButton ;

    public function mount()
    {
        $this->segment = request()->segment(1);

        $this->persianCaptionButton = getPersianModuleCaptionCreateButtons( request()->segment(1));

    }


};
?>

<div>

   <flux:link :href="route($segment.'.'.'create')" wire:navigate>{{ __( $persianCaptionButton) }}</flux:link>

</div>