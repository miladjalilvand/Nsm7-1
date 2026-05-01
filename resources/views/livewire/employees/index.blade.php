<div>

    <livewire:branch_switcher />


        <flux:button wire:click="open_modal"

        >
            {{ __('جدید') }}
        </flux:button>


@foreach($employees as $item_employee)

  <div class="flex flex-col">
    <div class="flex flex-col m-1 p-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">

<span class="text-gray-900 dark:text-gray-100">نام : {{$item_employee->name}}</span><br/>

<div>
<span class="text-gray-700 dark:text-gray-300">سرویس ها </span><br/>

    @foreach($item_employee->services as $item_service_employee)
<span class="text-gray-600 dark:text-gray-400">{{$item_service_employee->caption}}</span></br>
@endforeach
</div>
  
</div>
</div>
<flux:button 
    wire:click="add_service({{ $item_employee->id }})"
    wire:loading.attr="disabled"
    wire:target="add_service({{ $item_employee->id }})"
>
    افزودن سرویس
</flux:button>
                     
<div class="text-left">
 <flux:modal.trigger name="employees">
        <flux:button variant="primary"
        wire:click="show_edit({{$item_employee}})" >
         
           
                ویرایش
            
        </flux:button>
    </flux:modal.trigger>
</div>
<flux:modal

:show="$errors->isNotEmpty()" focusable class="max-w-lg"
 wire:model="showModalAddService" 
>


@foreach($services as $services_item)

<flux:button
wire:click="add_service_to_employee({{ $services_item->id }})"
>
 <span class="{{in_array($services_item->id , $employe_service_ids) ? 'text-green-600 dark:text-green-400':'text-red-600 dark:text-red-400'}}">
    {{$services_item->caption}}

</span>


</flux:button>
@endforeach

<br/>
<flux:button
wire:click="store_employe_service()"
>
ذخیره تغیرات</flux:button>

</flux:modal>
@endforeach

   <flux:modal name="employees" :show="$errors->isNotEmpty()" focusable class="max-w-lg"
    wire:model="isopen"
   >
                <form  
            class="space-y-4 p-4 bg-white dark:bg-gray-800 rounded-lg"
            >
                    <flux:input
    label="نام"
    placeholder="نام را وارد کنید"
    type="text"
    wire:model="name"
    :error="$errors->first('name')"
/>
        <flux:input
    label="عنوان"
    placeholder="کپشن را وارد کنید"
    type="text"
    wire:model="caption"
    :error="$errors->first('caption')"
/>

@foreach(farsi_week_days() as  $week_day )
<flux:button
wire:click="add_week_day('{{ $week_day }}')"
>
<span class="{{in_array($week_day ,array_keys($working_times)) ? 'text-gray-700 dark:text-gray-300':'text-gray-400 dark:text-gray-600'}}">
{{$week_day}}</span>

</flux:button>
@endforeach
   <flux:modal name="showModalWeekday" :show="$errors->isNotEmpty()" focusable class="max-w-lg"
    wire:model="showModalWeekday"
   >
<span class="text-gray-900 dark:text-gray-100">{{$weekday_selected}}</span><br/>
@if(isset($working_times[$weekday_selected])) 
@foreach($working_times[$weekday_selected] as $key => $item ) 
<span class="text-gray-700 dark:text-gray-300">
    {{$item['start']}} -- {{$item['end']}}
</span>
 <flux:button wire:click.prevent="remove_time('{{$key}}','{{$weekday_selected}}')" >حذف</flux:button>
<br/>


@endforeach @endif
                <form class="space-y-3 mt-3">
                     {{-- فرم داخلی برای انتخاب ساعت --}}
                    <flux:input
                        label="از ساعت" {{-- تصحیح شده lable به label --}}
                        type="time"
                        wire:model="startTime" {{-- متغیر جدا برای شروع ساعت --}}
                        :error="$errors->first('startTime')" {{-- اضافه کردن نمایش خطا --}}
                    />
                    <flux:input
                        label="تا ساعت" {{-- تصحیح شده lable به label --}}
                        type="time"
                        wire:model="endTime" {{-- متغیر جدا برای پایان ساعت --}}
                        :error="$errors->first('endTime')" {{-- اضافه کردن نمایش خطا --}}
                    />

                     <flux:button
                        wire:click.prevent="add_time('{{$weekday_selected}}')" {{-- استفاده از .prevent برای جلوگیری از سابمیت فرم و اجرای متد ذخیره --}}
                        variant="filled" {{-- یا استایل دلخواه --}}
                    >
                        افزودن
                    </flux:button>
                </form>

</flux:modal>

                      
                    <flux:button wire:click.prevent="store" variant="filled">
                    {{ __('ذخیره') }}
                
                </flux:button>
             
        </form>
    </flux:modal>
</div>