<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-6 py-12 mx-auto max-w-7xl sm:px-12 sm:py-16">
        <div class="relative z-10 flex flex-col items-center justify-center w-full max-w-3xl text-center">
            <h1 class="text-4xl font-extrabold leading-tighter tracking-tighter text-gray-900 sm:text-6xl dark:text-white">Welkom bij <span class="text-red-500">Libel<span class="text-blue-500">Net</span></span></h1>
            <p class="mt-5 text-xl text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec aliquet orci. Donec sit amet eros at nis
                lacinia fermentum. Duis imperdiet volutpat dolor sit amet finibus. </p>
            <div class="flex flex-col items-center justify-center mt-12 sm:flex-row sm:justify-start">

                @if (Route::has('login'))
                    @auth
                        <a href="/dashboard" wire:navigate class="px-8 py-4  text-base font-semibold text-red-500 transition duration-200 ease-in-out transform bg-white border border-red-500 rounded-lg hover:bg-red-50 focus:ring-red-500 focus:ring-offset-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 hover:scale-105">Dashboard</a>
                    @else
                        <a href="/login" wire:navigate class="px-8 py-4 mx-3 text-base font-semibold text-red-500 transition duration-200 ease-in-out transform bg-white border border-red-500 rounded-lg hover:bg-red-50 focus:ring-red-500 focus:ring-offset-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 hover:scale-105">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="/register" wire:navigate class="px-8 py-4 mb-3 mx-3 text-base font-semibold text-white transition duration-200 ease-in-out transform bg-red-500 rounded-lg hover:bg-red-600 focus:ring-red-500 focus:ring-offset-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mb-0 hover:scale-105">
                                Registreer
                            </a>
                        @endif
                    @endauth
                @endif



            </div>
        </div>
    </div>
</div>
