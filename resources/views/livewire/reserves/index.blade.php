<div>
<flux:select
    label="انتخاب شعبه"
    wire:model="current_branch_id"
    :error="$errors->first('current_branch_id')"
    wire:change="onBranchChange"
>
    @forelse($branches ?? [] as $branch)
        <flux:select.option value="{{ $branch->id }}">
            {{ $branch->caption }}
        </flux:select.option>
    @empty
        <flux:select.option disabled value="">
            هیچ شعبه‌ای یافت نشد
        </flux:select.option>
    @endforelse
</flux:select>



<div class="mt-3 flex flex-row justify-center text-center space-x-2.5">
     <flux:button  wire:click="change_list_days('next7')" class="cursor-pointer font-extrabold"><</flux:button>
    @foreach ($selected_days as $day )
        <span class="w-[60px]">{{ $day->format('D M d') }}</span>
    @endforeach
    <flux:button wire:click="change_list_days('past7')" class="cursor-pointer font-extrabold">></flux:button>

</div>
<!-- 
<input type="time" id="ab"/>
<input type="date"  id="ab"/> -->

</div>