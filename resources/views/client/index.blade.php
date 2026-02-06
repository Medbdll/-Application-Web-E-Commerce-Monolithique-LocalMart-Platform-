@extends('layouts.client-layout')
@section('title','GAMING HOME')
@section('content')

    <x-categories :categories="$categories"/>

    <section class="max-w-7xl mx-auto px-6 py-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-end gap-6">
            <div>
                <h1 class="text-2xl md:text-3xl font-display font-bold text-vortexGreen uppercase leading-tight tracking-wide">
                    Discover all our products.
                </h1>
                <p class="text-gray-400 mt-1 text-sm">Desktops, keyboards, laptops & more</p>
            </div>

            <div class="relative w-full md:w-[400px]">
                <input type="text"
                       placeholder="SEARCH FOR A PRODUCT"
                       class="w-full bg-transparent border border-gray-700 text-white px-4 py-4 pr-12 focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all duration-300 placeholder-gray-500 text-sm tracking-wider font-semibold rounded-sm">
                <i class="fa-solid fa-magnifying-glass absolute right-4 top-5 text-gray-400"></i>
            </div>
        </div>
    </section>

    <x-cards :products="$products"/>


    <section class="bg-black py-20 text-center relative overflow-hidden">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[300px] bg-white/5 blur-3xl rounded-full -z-10"></div>

        <h2 class="text-3xl md:text-5xl font-display font-bold uppercase tracking-wider mb-20 text-white">The Perks of
            Vortex.ma</h2>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-12">

            <div class="flex flex-col items-center group">
                <div class="mb-6 relative">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium tracking-wide">3-Month Guarantee</h3>
            </div>

            <div class="flex flex-col items-center group">
                <div class="mb-6">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                        <path d="M21 3v5h-5"></path>
                        <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                        <path d="M8 16H3v5"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium tracking-wide">Risk-Free Return</h3>
            </div>

            <div class="flex flex-col items-center group">
                <div class="mb-6">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                </div>
                <h3 class="text-lg font-medium tracking-wide">Express Delivery</h3>
            </div>

            <div class="flex flex-col items-center group">
                <div class="mb-6">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                        <circle cx="12" cy="8" r="3"></circle>
                    </svg>
                </div>
                <h3 class="text-lg font-medium tracking-wide">Premium Quality</h3>
            </div>

        </div>
    </section>

@endsection
