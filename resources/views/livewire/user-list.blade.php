    <section class="mt-10">
        <div class="px-4 lg:px-12">
           <section class="my-10">
            <h2 class="text-md my-5 text-gray-300">
                @if (auth()->user()->clock_in !== null)
                    @if ($clockInTime)
                    <p>Ingeklokt voor: {{ $elapsedTime }}</p>
                @endif
                @endif
@php
    $totalHours = 0;
    $clockInTime = null;
    $timestamps = [];
@endphp

@foreach ($clockins as $clockin)
    @php
        $timestamps = [
            $clockin->clock_in, // clocked in
            $clockin->clock_out, // clocked out
        ];

        foreach ($timestamps as $timestamp) {
            if ($timestamp !== null) {
                $currentTimestamp = strtotime($timestamp);

                if ($clockInTime === null) {
                    // Clock in
                    $clockInTime = $currentTimestamp;
                } else {
                    // Clock out
                    $totalHours += ($currentTimestamp - $clockInTime) / 3600; // convert seconds to hours
                    $clockInTime = null;
                }
            }
        }

        // If the last entry is a clock-in, assume they are still clocked in, and calculate until the current time
        if ($clockInTime !== null) {
            $totalHours += (time() - $clockInTime) / 3600;
        }
    @endphp
@endforeach

{{-- Display the combined total hours --}}

    <section class="mt-3">
    <h2 class="text-md my-5 text-gray-300">
        
        Totaal: {{ number_format($totalHours, 2) }}
    </h2>
</section>
                
                
            </h2>
            @if (Auth::user()->clock_in === null)
                <button wire:click='clockIn' class="px-4 py-3 bg-gray-800 mx-auto rounded text-gray-300 hover:bg-gray-700">Inklokken</button>
                <button wire:click='clockOut' class="px-4 py-3 bg-gray-800 mx-auto rounded text-gray-300 disabled:opacity-70" disabled>Uitklokken</button>
            @else
                <button wire:click='clockIn' class="px-4 py-3 bg-gray-800 mx-auto rounded text-gray-300 @if($clockInTime) disabled:opacity-70 @else hover:bg-gray-700 @endif" @if($clockInTime) disabled @endif>Inklokken</button>
                <button wire:click='clockOut' class="px-4 py-3 bg-gray-800 mx-auto rounded text-gray-300 hover:bg-gray-700">Uitklokken</button>
            @endif

            
        </section>
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex w-full">
                        <div class="relative w-full">
                            <input wire:model.live.debounce.300ms='search' type="text" class="bg-gray-900 w-1/3 text-gray-300 border border-gray-800" placeholder="Zoeken" required="">
                        </div>
                    </div>

                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">
                        <thead class="text-xs text-gray-400 uppercase">
                        <tr>
                            <th class="px-4 py-3">
                                Naam
                            </th>
                            <th class="px-4 py-3">
                                Ingeklokt
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                       @if ($user->clock_in)
                            <tr class="border-b dark:border-gray-900">

                            <td class="px-4 py-3">
                                {{ $user->name }}
                            </td>
                            <td class="px-4 py-3">
                                @if ($user->clock_in !== null)
                                    {{ $user->clock_in }}
                                @else
                                    Niet ingeklokt
                                @endif
                            </td>

                        </tr>
                           
                       @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex">
                        <div class="flex space-x-4 items-center justify-end w-full mb-3">
                            <label>Per page</label>
                                <select wire:model.live='perPage' class="border border-gray-800 dark:bg-gray-900 rounded text-gray-300">
                                <option>10</option>
                                <option>15</option>
                                <option>50</option>
                                <option>100</option>
                                </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>