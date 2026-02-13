@extends('layouts.client-layout')
@section('title', $category->name . ' Products')
@section('content')

    <x-categories :categories="$categories"/>

    <section class="max-w-7xl mx-auto px-6 py-6 mb-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
            <div class="w-full lg:w-auto">
                <h1 class="text-3xl md:text-4xl font-display font-bold text-vortexGreen uppercase leading-tight tracking-wide mb-2">
                    {{ $category->name }}
                </h1>
                <p class="text-gray-400 text-sm md:text-base">{{ $category->description ?? 'Browse our collection of ' . $category->name }}</p>
                <div class="mt-4 flex items-center gap-4">
                    <span class="text-sm text-gray-500">{{ $products->total() }} products found</span>
                    @if(request()->has('search'))
                        <span class="text-sm text-vortexGreen">Showing results for "{{ request('search') }}"</span>
                    @endif
                </div>
            </div>

            <div class="w-full lg:w-[400px]">
                <form method="GET" action="{{ route('category.products', $category->slug) }}" class="relative">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="SEARCH IN {{ strtoupper($category->name) }}"
                           class="w-full bg-transparent border border-gray-700 text-white px-4 py-4 pr-12 focus:outline-none focus:border-neon focus:ring-2 focus:ring-neon/20 transition-all duration-300 placeholder-gray-500 text-sm tracking-wider font-semibold rounded-sm">
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-neon transition-colors duration-300">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Breadcrumb -->
        <nav class="mt-6 flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-neon transition-colors">Home</a>
            <span class="text-gray-600">/</span>
            <span class="text-neon font-medium">{{ $category->name }}</span>
        </nav>
        
        <!-- Filters and Sort -->
        <div class="mt-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 bg-neon/10 border border-neon/30 text-neon text-sm font-medium rounded-sm hover:bg-neon/20 transition-all duration-300">
                    All Products
                </button>
                <button class="px-4 py-2 bg-transparent border border-gray-700 text-gray-400 text-sm font-medium rounded-sm hover:border-neon hover:text-neon transition-all duration-300">
                    In Stock
                </button>
                <button class="px-4 py-2 bg-transparent border border-gray-700 text-gray-400 text-sm font-medium rounded-sm hover:border-neon hover:text-neon transition-all duration-300">
                    On Sale
                </button>
            </div>
            
            <select class="bg-transparent border border-gray-700 text-white px-4 py-2 focus:outline-none focus:border-neon text-sm font-medium rounded-sm">
                <option>Sort by: Latest</option>
                <option>Sort by: Price (Low to High)</option>
                <option>Sort by: Price (High to Low)</option>
                <option>Sort by: Name (A-Z)</option>
            </select>
        </div>
    </section>

    <x-cards :products="$products"/>


@endsection
