<div>
    <nav>
        <div class="flex justify-between items-center bg-gray-800 p-4">
            <div class="flex ">
{{--                <div class="flex items-center px-2">--}}
{{--                    <a href="{{ route('home') }}" class="text-white font-bold">Home</a>--}}
{{--                </div>--}}
                <x-nav.nav-item href="{{ route('home') }}">
                    Home
                </x-nav.nav-item>
                <x-nav.nav-item href="{{ route('callback') }}">
                    Contact
                </x-nav.nav-item>
            </div>
        </div>
    </nav>
</div>
