@props([
    'heading' => 'Input',
    'example' => 'Example',
    'icon' => 'user',
    'iconPosition' => 'row-reverse',
    'iconType' => 'regular',
    'type' => 'text',

])

<div class="flex flex-col mt-3">
    <label for="{{$heading}}" class="block mb-2 text-sm font-medium text-gray-900 text-gray-950">{{ $heading }}</label>
    <div class="rounded flex group rounded-md overflow-hidden flex-{{ $iconPosition }}">
        <div class="bg-gray-400 flex justify-center items-center w-10"><i class="p-3 fa-{{ $iconType }} fa-{{ $icon }}"></i></div>
        <input type="{{ $type }}" id="{{ $heading }}" name="{{ $heading }}" class="w-96 p-3 border border-gray-300 shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:placeholder-gray-400 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="{{ $example }}">
    </div>
</div>
