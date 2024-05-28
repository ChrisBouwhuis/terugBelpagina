@props([
    'heading' => 'Input',
    'example' => 'Example',
    'icon' => 'user',
    'iconType' => 'regular',
    'name' => 'input'
])


<div class="flex flex-col h-full">
    <label for="{{$heading}}" class="block mb-2 text-sm font-medium text-black/80">{{ $heading }}</label>
    <div class="flex group rounded-md overflow-hidden flex-row h-full">
        <div class="bg-slate-400 flex justify-center items-center w-10 min-h-max"><i class="p-3 fa-{{ $iconType }} fa-{{ $icon }}"></i></div>
        <textarea id="{{ $heading }}" name="{{ $name }}"
                  class="w-full p-3 border border-gray-300 rounded-r-md shadow-sm bg-slate-200
                   dark:placeholder-black/60 focus:ring-[#DCE0D9] focus:border-[#DCE0D9] sm:text-sm min-h-max" placeholder="{{ $example }}"></textarea>
    </div>
</div>
