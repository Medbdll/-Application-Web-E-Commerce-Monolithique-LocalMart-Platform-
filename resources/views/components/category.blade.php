@props(['category'])
<a href="{{ route('category.products', $category->slug) }}" class="flex-shrink-0 group cursor-pointer hover:-translate-y-1 transition duration-300 block">
    <div class="h-20 flex items-center justify-center">
        <img src="{{ asset('assets/icons/' . $category->slug . '-icon.png') }}" 
             alt="{{ $category->name }}" 
             class="w-24 h-auto transition">
    </div>
    <p class="text-xs text-gray-300 font-medium group-hover:text-vortexGreen transition text-center mt-2">
        {{ $category->name }}
    </p>
</a>
