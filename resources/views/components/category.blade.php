@props(['category'])
@php
    $iconMap = [
        'gaming-desktops' => 'desktop-icon.png',
        'gaming-laptops' => 'laptops-icon.png',
        'mechanical-keyboards' => 'keyboard-icon.png',
        'gaming-mice' => 'mouse-icon.png',
        'gaming-chairs' => 'chairs-icon.png',
    ];
    
    $iconName = $iconMap[$category->slug] ?? 'desktop-icon.png';
@endphp
<a href="{{ route('category.products', $category->slug) }}" class="flex-shrink-0 group cursor-pointer hover:-translate-y-1 transition duration-300 block">
    <div class="h-20 flex items-center justify-center">
        @if($category->image)
            <img src="{{ $category->image }}" 
                 alt="{{ $category->name }}" 
                 class="w-24 h-auto transition">
        @else
            <img src="{{ asset('assets/icons/' . $iconName) }}" 
                 alt="{{ $category->name }}" 
                 class="w-24 h-auto transition">
        @endif
    </div>
    <p class="text-xs text-gray-300 font-medium group-hover:text-vortexGreen transition text-center mt-2">
        {{ $category->name }}
    </p>
</a>
