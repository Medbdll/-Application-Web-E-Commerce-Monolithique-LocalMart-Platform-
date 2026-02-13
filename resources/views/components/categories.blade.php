@props(['categories'])
<section class="py-8 bg-gradient-to-b from-black to-[#050505] overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="overflow-x-auto custom-scrollbar pb-4">
            <div class="flex gap-8 justify-center md:justify-start">
                <a href="{{ route('home') }}" class="px-6 py-2 bg-vortexGreen flex items-center justify-center text-black font-semibold rounded-lg hover:bg-[#00cc6a] transition-colors duration-200 whitespace-nowrap">
                    All
                </a>
                @foreach ($categories as $category)
                    <x-category :category="$category"/>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        height: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background:none;
    }
</style>
