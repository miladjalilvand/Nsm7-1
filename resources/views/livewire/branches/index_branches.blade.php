<div>

@if($employee_service_list_selected)
<button class="fixed bottom-6 left-6 h-12 bg-gray-500 text-white px-6 rounded-full shadow-lg hover:bg-blue-600 transition-colors z-50 flex items-center justify-center">
    Pick
</button>
@endif
    @if($state == 1)
   <div class="flex flex-col">
     <flux:button  wire:click="switchState({{0}})">
        بازگشت 
    </flux:button>

    @foreach($branch_services as $branch_service_item)
    <span>{{$branch_service_item->caption}}</span>
@if($branch_service_item->employees->count())
        @foreach($branch_service_item->employees as $branch_service_employee_item)

<span>{{$branch_service_employee_item->caption}}</span>
    @endforeach
    @endif
    @endforeach

   </div>
    @endif

    @if($state == 0)
    @foreach($branches as $branch_item)
    <div class="text-center m-1 p-3">
        <h1 class="text-right">{{$branch_item->caption}}</h1>
        <div class="flex flex-col md:flex-row justify-between ">


            <flux:link>
                تماس
            </flux:link>

            <flux:button  wire:click="select_branch({{$branch_item}})">
                نویت جدید
            </flux:button>

        </div>
        <div clsas="flex md:flex-row flex-col">
            <flux:link>
                موقغیت مکانی
            </flux:link>

            <span class="text-center">
                {{$branch_item->address}}
            </span>
        </div>

    </div>
    @endforeach
    @endif

</div>