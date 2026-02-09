@props(['product'])
<div class="bg-cardBg p-4 group hover:-translate-y-1 transition duration-300 border border-transparent hover:border-gray-800">
                <div class="h-56 bg-[#0a0a0a] w-full mb-4 flex items-center justify-center">
                    <span src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="text-gray-700 text-xs uppercase tracking-widest"></span>
                </div>
                <h3 class="text-white font-medium text-lg mb-1">{{$product->name}}</h3>
                <p class="text-gray-500 text-xs mb-6 leading-relaxed">{{ Str::limit($product->description, 80) }}</p>
                <div class="flex justify-between items-center mt-auto">
                    <span class="text-xl font-bold">{{ $product->price }} MAD</span>
                    <a href="{{ route('products.show',$product->id) }}" class="bg-vortexGreen text-black font-bold px-4 py-1 text-sm hover:bg-white transition uppercase">Buy</a>
                </div>
            </div>
