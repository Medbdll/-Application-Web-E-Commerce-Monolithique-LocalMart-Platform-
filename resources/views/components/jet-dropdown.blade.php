@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    $alignClasses = [
        'left' => 'origin-top-left left-0',
        'right' => 'origin-top-right right-0',
    ];

    $widthClasses = [
        '48' => 'w-48',
    ];

    $dropdownWidth = $widthClasses[$width] ?? $widthClasses['48'];
    $dropdownAlignment = $alignClasses[$align] ?? $alignClasses['right'];
@endphp

<div x-data="{ open: false }" class="relative">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         @click.away="open = false"
         class="absolute z-50 mt-2 {{ $dropdownWidth }} rounded-md shadow-lg {{ $dropdownAlignment }}"
         style="display: none;"
         {{ $attributes }}>
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
