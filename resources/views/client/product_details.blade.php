@extends('layouts.client-layout')
@section('title','Product Details')
@section('content')


    <main class="max-w-7xl mx-auto px-6 py-10">
        
        <nav class="flex text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-8 font-sci-fi">
            <a href="acceuil.html" class="hover:text-vortexGreen">Store</a>
            <span class="mx-3 text-gray-800">/</span>
            <span class="text-vortexGreen">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 mb-16">
            
            <div class="space-y-4">
                <div class="aspect-[4/3] bg-card-bg border border-gray-800 flex items-center justify-center relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-6 h-6 border-t border-l border-vortexGreen/50"></div>
                    <span class="text-gray-700 font-sci-fi text-lg tracking-[0.3em] uppercase opacity-50">Product_Visual</span>
                </div>
                
                <div class="grid grid-cols-4 gap-4">
                    <button class="aspect-square bg-card-bg border border-vortexGreen p-1"><div class="w-full h-full bg-black/40"></div></button>
                    <button class="aspect-square bg-card-bg border border-gray-800 p-1 hover:border-vortexGreen/50 transition"><div class="w-full h-full bg-black/40"></div></button>
                    <button class="aspect-square bg-card-bg border border-gray-800 p-1 hover:border-vortexGreen/50 transition"><div class="w-full h-full bg-black/40"></div></button>
                </div>
            </div>

            <div class="flex flex-col justify-center">
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-vortexGreen text-[11px] font-sci-fi font-bold tracking-[0.2em] uppercase">{{ $seller->name }}</span>
                        <div class="h-[1px] flex-grow bg-gradient-to-r from-green-900/50 to-transparent"></div>
                    </div>
                    
                    <h1 class="text-4xl font-sci-fi font-black uppercase tracking-tight mb-4">
                        {{$product->name}} <span class="text-vortexGreen drop-shadow-[0_0_10px_rgba(57,255,20,0.3)]"></span>
                    </h1>
                    
                    <div class="flex items-center gap-6 mb-6">
                        <div class="flex text-vortexGreen text-xs gap-1">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <span class="text-gray-500 text-[11px] font-sci-fi tracking-widest">256_REVIEWS</span>
                    </div>

                    <div class="flex items-center gap-4 mb-6">
                        <div>
                            <span class="text-gray-400 text-sm">Stock Status:</span>
                            @if($product->stock > 0)
                                <span class="text-vortexGreen font-bold">{{ $product->stock }} units available</span>
                            @else
                                <span class="text-red-500 font-bold">Out of stock</span>
                            @endif
                        </div>
                    </div>

                    <div class="text-4xl font-sci-fi font-bold mb-6 text-white tracking-tighter">${{ $product->price }}</div>
                    
                    <p class="text-gray-400 text-sm leading-relaxed max-w-md border-l-2 border-gray-900 pl-6">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="space-y-8 bg-card-bg/30 p-6 border border-gray-900">
                    <div id="stock-warning" class="hidden">
                        <div  class=" bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-4 flex items-center gap-3">
                            <i class="fa-solid fa-exclamation-triangle"></i>
                            <span class="text-sm">Only <span id="available-stock">{{ $product->stock }}</span> units available in stock!</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap items-end gap-6">
                        <div class="space-y-3">
                            <span class="block text-[10px] font-sci-fi text-gray-500 uppercase tracking-[0.2em]">Quantity</span>
                            <div class="flex items-center border border-gray-700 bg-black h-12 w-32">
                                <button onclick="changeQty(-1)" class="flex-1 h-full flex items-center justify-center hover:text-vortexGreen transition border-r border-gray-800"><i class="fa-solid fa-minus text-xs"></i></button>
                                <input type="text" value="1" readonly class="qty w-12 bg-transparent text-center font-sci-fi font-bold text-sm text-white outline-none">
                                <button onclick="changeQty(1)" class="flex-1 h-full flex items-center justify-center hover:text-vortexGreen transition border-l border-gray-800"><i class="fa-solid fa-plus text-xs"></i></button>
                            </div>
                        </div>
                        
                        <div class="flex-grow">
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <input  class="qty" type="hidden" name="quantity" value="1">
                                <button class="w-full bg-vortexGreen text-black font-sci-fi font-black uppercase h-12 text-sm tracking-[0.2em] hover:bg-white hover:scale-[1.02] transition-all duration-300">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12">
            <h3 class="text-sm font-sci-fi font-bold uppercase mb-8 flex items-center gap-3">
                <span class="w-1 h-4 bg-vortexGreen"></span> Pilot_Feedback
            </h3>

            <div class="mb-8 p-4 border border-gray-800 bg-card-bg/50 relative group">
                <div class="absolute top-0 left-0 w-1 h-full bg-vortexGreen/20 group-hover:bg-vortexGreen transition-colors duration-300"></div>
                <h4 class="text-xs font-sci-fi text-gray-400 uppercase tracking-widest mb-3">Add_New_Entry</h4>
                
                <form action="#" method="POST">
                    @csrf
                    <div class="space-y-3">
                        <div>
                            <label class="block text-[10px] font-sci-fi text-vortexGreen uppercase tracking-[0.2em] mb-1">Rating_Class</label>
                            <div class="flex flex-row-reverse justify-end w-fit">
                                <input type="radio" id="star5" name="rating" value="5" class="peer hidden">
                                <label for="star5" class="peer text-gray-700 text-lg cursor-pointer hover:text-vortexGreen peer-hover:text-vortexGreen peer-checked:text-vortexGreen transition-colors px-1"><i class="fa-solid fa-star"></i></label>
                                
                                <input type="radio" id="star4" name="rating" value="4" class="peer hidden">
                                <label for="star4" class="peer text-gray-700 text-lg cursor-pointer hover:text-vortexGreen peer-hover:text-vortexGreen peer-checked:text-vortexGreen transition-colors px-1"><i class="fa-solid fa-star"></i></label>
                                
                                <input type="radio" id="star3" name="rating" value="3" class="peer hidden">
                                <label for="star3" class="peer text-gray-700 text-lg cursor-pointer hover:text-vortexGreen peer-hover:text-vortexGreen peer-checked:text-vortexGreen transition-colors px-1"><i class="fa-solid fa-star"></i></label>
                                
                                <input type="radio" id="star2" name="rating" value="2" class="peer hidden">
                                <label for="star2" class="peer text-gray-700 text-lg cursor-pointer hover:text-vortexGreen peer-hover:text-vortexGreen peer-checked:text-vortexGreen transition-colors px-1"><i class="fa-solid fa-star"></i></label>
                                
                                <input type="radio" id="star1" name="rating" value="1" class="peer hidden">
                                <label for="star1" class="peer text-gray-700 text-lg cursor-pointer hover:text-vortexGreen peer-hover:text-vortexGreen peer-checked:text-vortexGreen transition-colors px-1"><i class="fa-solid fa-star"></i></label>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-[10px] font-sci-fi text-vortexGreen uppercase tracking-[0.2em] mb-1">Observation_Log</label>
                            <textarea name="comment" rows="2" class="w-full bg-black border border-gray-800 text-gray-300 p-2 text-sm focus:border-vortexGreen focus:ring-1 focus:ring-vortexGreen focus:outline-none transition-all placeholder-gray-700" placeholder="Enter your observations..."></textarea>
                        </div>

                        <button type="submit" class="bg-vortexGreen text-black font-sci-fi font-bold uppercase px-6 py-2 text-[10px] tracking-[0.2em] hover:bg-white transition-all duration-300">
                            Submit_Entry
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($reviews as $review)
                <div class="bg-card-bg border border-gray-800 p-5 product-card-glow">
                    <div class="flex justify-between mb-3">
                        <span class="text-[11px] font-sci-fi text-vortexGreen">{{ $review->user->name }}</span>
                        <div class="flex text-vortexGreen text-[9px] gap-0.5"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    </div>
                    <p class="text-gray-400 text-xs italic">"{{ $review->comment }}"</p>
                </div>
                @endforeach
            </div>
        </div>
        <script>
            window.productStock = {{ $product->stock }};
        </script>
        <script src="{{ asset('js/products_details.js') }}"></script>
    </main>
@endsection