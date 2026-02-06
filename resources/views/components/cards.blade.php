@props(['products'])
<section class="max-w-7xl mx-auto px-6 mb-16">
    <div class="mb-8">
        <h2 class="text-3xl font-display font-bold uppercase tracking-wide">Best Sellers</h2>
        <p class="text-gray-400 text-sm">Join the hype train with the hottest products in our arsenal</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products->take(8) as $product)
            <x-card :product="$product"/>
        @endforeach
    </div>
</section>
