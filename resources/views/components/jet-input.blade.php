@props(['type' => 'text', 'name'])

@php
    $classes = 'block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm';
@endphp

<input {{ $attributes->merge(['type' => $type, 'name' => $name, 'class' => $classes]) }}>
