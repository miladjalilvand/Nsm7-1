<div>
    <flux:modal.trigger name="branches">
        <flux:button variant="primary" x-data="" x-on:click.prevent="$dispatch('open-modal', 'branches')" data-test="delete-user-button">
            {{ __('جدید')}}
        </flux:button>
    </flux:modal.trigger>
{{$branches->count()}}

       <flux:modal name="branches" :show="$errors->isNotEmpty()" focusable class="max-w-lg"
        wire:model="showModal"
       
       >
                   <form wire:submit="store" 
            class=""
            >
{{-- ... --}}
{{-- فرض می‌کنیم این کد داخل یک تگ 
     قرار می‌گیرد --}}

{{-- فیلد caption (که قبلاً داشتید و درست است) --}}
<flux:input
    label="عنوان"
    placeholder="کپشن را وارد کنید"
    type="text"
    wire:model="caption"
    :error="$errors->first('caption')"
/>

{{-- فیلد phone --}}
<flux:input
    label="تلفن"
    placeholder="شماره تلفن را وارد کنید"
    type="tel" {{-- type="tel" برای شماره تلفن مناسب‌تر است --}}
    wire:model="phone"
    :error="$errors->first('phone')"
/>

{{-- فیلد mobile --}}
<flux:input
    label="موبایل"
    placeholder="شماره موبایل را وارد کنید"
    type="tel" {{-- type="tel" یا type="text" --}}
    wire:model="mobile"
    :error="$errors->first('mobile')"
/>

{{-- فیلد address --}}
<flux:input
    label="آدرس"
    placeholder="آدرس کامل را وارد کنید"
    type="text"
    wire:model="address"
    :error="$errors->first('address')"
/>

{{-- فیلد location --}}
<flux:input
    label="موقعیت مکانی (مثال: طول و عرض جغرافیایی)"
    placeholder="مثال: 35.6892, 51.3890"
    type="text" {{-- یا type="text" --}}
    wire:model="location"
    :error="$errors->first('location')"
/>

{{-- فیلد working_times --}}
{{-- برای زمان‌های کاری، بسته به پیچیدگی، ممکن است نیاز به یک کامپوننت سفارشی‌تر یا textarea باشد --}}
<flux:input
    label="ساعات کاری"
    placeholder="مثال: شنبه تا چهارشنبه: 8:00 - 17:00"
    type="text" {{-- یا type="textarea" اگر کامپوننت flux:input از آن پشتیبانی کند --}}
    wire:model="working_times"
    :error="$errors->first('working_times')"
/>

{{-- دکمه ارسال --}}




                      
                    <flux:button  type="submit" variant="filled">
                    {{ __('ذخیره') }}
                
                </flux:button>
             
    
                
            <!-- <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('Cancel') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit" data-test="confirm-delete-user-button">
                    {{ __('Delete account') }}
                </flux:button>
            </div> -->
            </form>

    </flux:modal>
    @foreach($branches->reverse() as $branch) 
<div class="flex flex-col">
    <div class="flex flex-col m-1 p-3">
        <div>
            <span>
عنوان شعبه : {{$branch->caption}}
            </span>
        </div>
        <div>
            <span>
                آدرس : {{$branch->address}}
            </span>
        </div>
                <div>
            <span>
                شماره تماس : {{$branch->phone}}
            </span>
        </div>
                <div>
            <span>
                موبایل : {{$branch->mobile}}
            </span>
        </div>
                <div>
            <span>
                موقعیت مکانی : {{$branch->location}}
            </span>
        </div>
                <div class="text-left">
 <flux:modal.trigger name="branches">
        <flux:button variant="primary"
        wire:click="show_edit({{$branch}})" >
         
           
                ویرایش
            
        </flux:button>
    </flux:modal.trigger>
        </div>

    </div>
</div>
@endforeach
    
</div>