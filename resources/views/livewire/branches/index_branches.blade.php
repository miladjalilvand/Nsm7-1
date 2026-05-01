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
@foreach($branch_categories as $branch_category_item)
    <div class="mb-4">
        <span class="text-gray-900 dark:text-gray-100 font-semibold text-lg border-r-4 border-blue-500 pr-3 transition-colors duration-300">
            {{ $branch_category_item->caption }}
        </span>
        <br/>

        <div class="mt-2 mr-4 space-y-2">
            @foreach($branch_category_item->services as $branch_service_item)
                <div class="text-gray-700 dark:text-gray-300 block p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200 transform hover:translate-x-1">
                    <div class="font-medium">
                        {{ $branch_service_item->caption }}
                    </div>
                    
                    @if($branch_service_item->employees->count() > 0)
                        <div class="ml-4 mt-1 text-sm text-gray-500 dark:text-gray-400 space-y-1">
                            <strong class="text-gray-700 dark:text-gray-300">کارمندان:</strong>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach($branch_service_item->employees as $branch_employee_item)
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs cursor-pointer hover:bg-blue-100 dark:hover:bg-blue-900 transition-all duration-200 hover:scale-105">
                                        {{ $branch_employee_item->name ?? $branch_employee_item->caption }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="ml-4 mt-1 text-sm text-yellow-500 dark:text-yellow-400">
                            ❌ هیچ کارمندی برای این سرویس موجود نیست
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
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