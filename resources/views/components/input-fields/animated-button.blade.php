<button
    {{ $attributes }} class="border border-black overflow-hidden relative bg-green-500 py-2 w-full h-full rounded group hover:bg-green-300 transition delay-75 duration-300">
    <span class="z-50">{{ $slot }}</span>
    <div
        class="absolute -top-10 -left-12 w-2 h-[10rem] bg-white/50 z-10 rotate-45 transition delay-75 duration-300 group-hover:translate-x-36"></div>
</button>
