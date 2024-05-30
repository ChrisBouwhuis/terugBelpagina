<x-head-nav-footer
    :pageName="'Home'"
>
    @if(session()->has('success'))
{{--        {{ session()->forget('success') }}--}}
        <div class="absolute top-5 right-10 w-[25rem]">
            <div x-data="toastNotification()" x-init="openToast()" x-show="open"
                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-90">
                <div class="p-4 rounded-md relative" :class="{'bg-green-500 text-white': success, 'bg-red-500 text-white': !success}">
                    <button @click="open = false" class="absolute top-0 right-0 m-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <h4 class="font-bold" x-text="title"></h4>
                    <p x-text="message"></p>
                </div>
            </div>
        </div>
    @endif
    <div class="grid place-items-center p-7">
        <h1 class="text-3xl font-bold">Hallo daar!</h1>
        <p class="">Welkom bij website.nl</p>
    </div>
</x-head-nav-footer>
