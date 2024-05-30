<x-head-nav-footer
    :pageName="'Home'"
>
    @if(session()->has('success'))
        <div class="absolute top-5 right-10 w-[25rem]">
            <x-alpine.alert />
        </div>
    @endif
    <div class="grid place-items-center p-7">
        <h1 class="text-3xl font-bold">Hallo daar!</h1>
        <p class="">Welkom bij website.nl</p>
    </div>
</x-head-nav-footer>
