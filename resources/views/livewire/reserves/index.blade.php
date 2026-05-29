<div class="w-full overflow-hidden  ">
    <div
        class="rounded-2xl border border-gray-200
         dark:border-gray-700 bg-white dark:bg-gray-900 shadow-sm p-4 w-[300px]">
        
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
    </div>

    {{-- روزها --}}
    <div
        class="
        shadow-lg p-3 sm:p-5 ">

        <div class="  h-[120px] flex items-center gap-2 sm:gap-3 overflow-x-auto scrollbar-hide">

            {{-- دکمه قبلی --}}
            <flux:button
                wire:click="change_list_days('next7')"
                class="min-w-[42px] h-[42px] rounded-full
                bg-gray-100 dark:bg-gray-800
                text-gray-700 dark:text-gray-200
                hover:bg-gray-200 dark:hover:bg-gray-700
                transition-all duration-200 shadow-sm"
            >
                <
            </flux:button>

            {{-- لیست روزها --}}
            @foreach ($selected_days as $day)

                @php
                    $formattedDay = $day->format('Y-m-d');
                @endphp

                <button
                    wire:click="select_date('{{ $formattedDay }}')"

                    @class([
                        'group min-w-[95px] sm:min-w-[110px]
                        py-3 px-2 rounded-2xl
                        flex flex-col items-center justify-center
                        transition-all duration-300
                        border backdrop-blur-md
                        hover:scale-105 active:scale-95',

                        // حالت عادی
                        'bg-white/90 dark:bg-gray-800/90
                        border-gray-200 dark:border-gray-700
                        hover:bg-gray-100 dark:hover:bg-gray-700
                        text-gray-700 dark:text-gray-200
                        shadow-sm hover:shadow-md'
                        =>
                            $selected_date != $formattedDay
                            && $selected_date != $day,

                        // حالت انتخاب شده
                        'bg-gradient-to-br from-gray-500 to-gray-600
                        text-white
                        shadow-lg shadow-blue-500/30 scale-105'
                        =>
                            $selected_date == $formattedDay
                            || $selected_date == $day,
                    ])
                >

                    <span class="text-sm font-bold">
                        {{ verta($day)->format('l') }}
                    </span>

                    <span
                        class="text-xs mt-1 opacity-80">
                        {{ verta($day)->format('j F') }}
                    </span>

                </button>

            @endforeach

            {{-- دکمه بعدی --}}
            <flux:button
                wire:click="change_list_days('past7')"
                class="min-w-[42px] h-[42px] rounded-full
                bg-gray-100 dark:bg-gray-800
                text-gray-700 dark:text-gray-200
                hover:bg-gray-200 dark:hover:bg-gray-700
                transition-all duration-200 shadow-sm"
            >
                >
            </flux:button>

        </div>
    </div>

</div>