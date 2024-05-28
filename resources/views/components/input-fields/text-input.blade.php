@props([
    'heading' => 'Input',
    'example' => 'Example',
    'icon' => 'user',
    'iconType' => 'regular',
    'type' => 'text',
    'name' => 'input'
])

<div class="flex flex-col">
    <label for="{{$heading}}" class="block mb-2 text-sm font-medium text-black/80">{{ $heading }}</label>
    <div class="flex group rounded-md overflow-hidden flex-row">
        <div class="bg-slate-400 flex justify-center items-center w-10 h-12"><i class="p-3 fa-{{ $iconType }} fa-{{ $icon }}"></i></div>
        <input type="{{ $type }}" id="{{ $heading }}" name="{{ $name }}"
               class="w-full h-12 p-3 border border-gray-300 rounded-r-md shadow-sm bg-slate-200
                dark:placeholder-black/60 focus:ring-[#DCE0D9] focus:border-[#DCE0D9] sm:text-sm" placeholder="{{ $example }}">
    </div>
</div>
