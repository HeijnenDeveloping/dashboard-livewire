<div class="flex flex-col justify-center">
    {{-- The best athlete wants his opponent at his best. --}}



    <h1 class="text-6xl my-6 text-gray-300 text-center">Taken lijst</h1>

    <div class="flex items-center justify-center mt-10">
        <input type="text" class="bg-gray-900 text-gray-300 border border-gray-800" wire:model='task'
            wire:keydown.enter='addTodo' placeholder="Voeg taak toe." />
    </div>

    <div class="grid grid-cols-12 mx-10">
        @foreach ($todos as $todo)
            <div class="col-span-3 mx-3 my-10">
                <div class="rounded-xl bg-zinc-400 shadow shadow-white px-4 py-6">
                    @if ($todo->status === 'afgerond')
                        <div class="flex justify-end">
                            <svg wire:click='verwijderTaak({{ $todo->id }})' xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-10 h-10 text-red-700 hover:cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </div>
                    @else
                        <div class="flex justify-end">
                            <svg wire:click='markAsDone({{ $todo->id }})' xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-12 h-12 hover:text-emerald-800 transition-all text-emerald-700 hover:cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                            </svg>
                        </div>
                    @endif
                    <h2 class="text-4xl text-gray-900 my-5 flex items-center justify-center">
                        {{ $todo->task }}
                    </h2>
                    <div>
                        <div class="flex items-center justify-center mt-20">

                            <div class="flex flex-col justify-center items-center w-full">
                                <label for=""
                                    class='flex w-full items-center justify-center font-bold uppercase px-4 py-4 mt-5 rounded border-gray-900 @if ($todo->status === 'openstaand') bg-red-700 @else bg-emerald-700 @endif text-gray-300'>
                                    @if ($todo->status === 'openstaand')
                                        Nog niet gedaan
                                    @else
                                        Afgerond
                                    @endif
                                </label>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
