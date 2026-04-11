<div>

    <livewire:branch_switcher />

    <livewire:component.create_button_section />
{{$services->count()}}
       <flux:modal name="services" :show="$errors->isNotEmpty()" focusable class="max-w-lg"
        wire:model="showModal"
       >
                   <form wire:submit="store" 
           
            >
{{-- ... --}}

{{-- فیلد caption (که قبلاً داشتید و درست است) --}}

 <flux:select
                label="دسته‌بندی"
                placeholder="انتخاب دسته"
                wire:model="category_id"
                :error="$errors->first('category_id')"
            >
            <flux:select.option value="">
                       
                    </flux:select.option>
                @forelse($categories ?? [] as $category)
                    <flux:select.option value="{{ $category->id }}">
                        {{ $category->caption }}
                    </flux:select.option>
                @empty
                    <flux:select.option disabled value="">
                        هیچ دسته‌ای یافت نشد
                    </flux:select.option>
                @endforelse
            </flux:select>

<flux:input
    label="عنوان"
    placeholder="عنوان را وارد کنید"
    type="text"
    wire:model="caption"
    :error="$errors->first('caption')"
/>

{{-- فیلد phone --}}
<flux:input
    label="زمان"

    placeholder="زمان را وارد کنید"
    type="number"
    wire:model="time"
    :error="$errors->first('address')"
/>

{{-- فیلد mobile --}}
<flux:input
    label="مبلغ"

    placeholder="مبلغ را وارد کنید"
    type="number"
    wire:model="cost"
    :error="$errors->first('cost')"
/>

{{-- فیلد address --}}
<flux:input
    label="توضیحات"
    placeholder=" توضیحات را وارد کنید"
    type="text"
    wire:model="description"
    :error="$errors->first('description')"
/>


{{-- دکمه ارسال --}}




            
                <flux:button type="submit" variant="primary">
                    ذخیره 
                </flux:button>

                

            </form>

    
    </flux:modal>
</div>