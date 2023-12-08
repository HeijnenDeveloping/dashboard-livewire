<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="px-6 py-6 text-white">
            <h2 class="text-3xl">Aanwezigheid</h2>
            <div class="bg-white max-w-7xl mx-auto mt-10 dark:bg-gray-800 overflow-hidden text-white shadow-xl sm:rounded-lg">

                @include('components.show-users', ['users' => $users])
            </div>
        </div>
    </div>
</x-app-layout>
