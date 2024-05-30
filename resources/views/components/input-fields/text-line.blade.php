@props(
    [
        'icon' => 'user',
        'iconType' => 'regular',
        'placeholder' => 'Placeholder'
    ]
)

<div class="flex group rounded-md overflow-hidden flex-row">
    <div class="bg-slate-400 flex justify-center items-center h-12"><i
            class="p-3 fa-{{ $iconType }} fa-{{ $icon }}"></i></div>
    <input type="text" {{ $attributes }}
    class="w-full h-12 p-3 border border-gray-300 rounded-r-md shadow-sm bg-slate-200  {{ $errors->has($attributes['wire:model.live']) ? 'border-red-500 border-2' : 'border-gray-300' }}
                dark:placeholder-black/60 focus:ring-[#DCE0D9] focus:border-[#DCE0D9] sm:text-sm"
           placeholder="{{ $placeholder }}">
</div>
