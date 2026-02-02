<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furnish - Premium Furniture E-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom colors for the theme */
        .teal-primary { color: #0891b2; }
        .teal-bg { background-color: #0891b2; }
        .teal-light { background-color: #e0f2fe; }
        .gold-accent { color: #f59e0b; }
        .gold-bg { background-color: #fef3c7; }
    </style>
</head>
<body class="bg-gray-50">
    
    <!-- HEADER / NAVBAR -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-8">
                    <h1 class="text-2xl font-bold teal-primary">Furnish</h1>
                    
                    <!-- Navigation Links -->
                    <div class="hidden md:flex space-x-6">
                        <a href="#" class="text-gray-700 hover:text-teal-600 transition">Home</a>
                        <a href="#" class="text-gray-700 hover:text-teal-600 transition">Shop</a>
                        <a href="#" class="text-gray-700 hover:text-teal-600 transition">Categories</a>
                        <a href="#" class="text-gray-700 hover:text-teal-600 transition">About</a>
                        <a href="#" class="text-gray-700 hover:text-teal-600 transition">Contact</a>
                    </div>
                </div>
                
                <!-- Right Icons -->
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-teal-600 transition">
                        <i class="fas fa-search text-lg"></i>
                    </button>
                    <button class="text-gray-600 hover:text-teal-600 transition relative">
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <span class="absolute -top-2 -right-2 bg-teal-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    <button class="text-gray-600 hover:text-teal-600 transition relative">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                    </button>
                    
                    <!-- User Avatar Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-600 hover:text-teal-600 transition">
                            <img src="https://picsum.photos/seed/avatar1/40/40.jpg" alt="User" class="w-8 h-8 rounded-full">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="p-2">
                                <div class="px-4 py-2 border-b">
                                    <span class="text-sm font-semibold text-gray-700">John Doe</span>
                                    <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">Client</span>
                                </div>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">My Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">Orders</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">Settings</a>
                                <hr class="my-2">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-teal-50 to-white overflow-hidden">
        <div class="container mx-auto px-4 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        Discover Your<br>
                        <span class="teal-primary">Perfect Space</span>
                    </h2>
                    <p class="text-lg text-gray-600">
                        Transform your home with our curated collection of premium furniture. 
                        Quality craftsmanship meets modern design for spaces that inspire.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="teal-bg text-white px-8 py-3 rounded-full hover:bg-teal-700 transition transform hover:scale-105">
                            Shop Now
                        </button>
                        <button class="border-2 border-teal-600 text-teal-600 px-8 py-3 rounded-full hover:bg-teal-50 transition">
                            Explore Categories
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://picsum.photos/seed/livingroom/600/400.jpg" alt="Modern Living Room" class="rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-teal-100 rounded-full opacity-50"></div>
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-orange-100 rounded-full opacity-50"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ADVANTAGES SECTION -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 teal-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shopping-bag text-white text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Easy Shopping</h3>
                    <p class="text-gray-600 text-sm">Simple and intuitive shopping experience</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 teal-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Fast & Free Shipping</h3>
                    <p class="text-gray-600 text-sm">Free delivery on orders over $500</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 teal-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600 text-sm">Always here to help you</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg transition">
                    <div class="w-16 h-16 teal-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Money Back Guarantee</h3>
                    <p class="text-gray-600 text-sm">30-day return policy</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCT CATEGORIES -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Shop by Category</h2>
                <p class="text-gray-600">Find exactly what you're looking for</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer">
                    <img src="https://picsum.photos/seed/tables/300/200.jpg" alt="Tables" class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="font-semibold text-gray-900">Tables</h3>
                        <p class="text-gray-600 text-sm">125 items</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer">
                    <img src="https://picsum.photos/seed/chairs/300/200.jpg" alt="Chairs" class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="font-semibold text-gray-900">Chairs</h3>
                        <p class="text-gray-600 text-sm">89 items</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer">
                    <img src="https://picsum.photos/seed/lighting/300/200.jpg" alt="Lighting" class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="font-semibold text-gray-900">Lighting</h3>
                        <p class="text-gray-600 text-sm">67 items</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer">
                    <img src="https://picsum.photos/seed/sofas/300/200.jpg" alt="Sofas" class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="font-semibold text-gray-900">Sofas</h3>
                        <p class="text-gray-600 text-sm">43 items</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button class="border-2 border-teal-600 text-teal-600 px-8 py-3 rounded-full hover:bg-teal-50 transition">
                    View All Categories
                </button>
            </div>
        </div>
    </section>

    <!-- PRODUCT GRID (CATALOGUE) -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Products</h2>
                <p class="text-gray-600">Handpicked pieces for your home</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/product1/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm">In Stock</span>
                        <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm">-30%</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Modern Dining Table</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(4.5)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$899</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$629</span>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <button class="text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                            <button class="teal-bg text-white px-4 py-2 rounded-full hover:bg-teal-700 transition">
                                <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                            </button>
                            <button class="text-gray-400 hover:text-teal-600 transition">
                                <i class="far fa-eye text-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/product2/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm">In Stock</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Ergonomic Office Chair</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(5.0)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-gray-900">$449</span>
                        </div>
                        <div class="flex justify-between">
                            <button class="text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                            <button class="teal-bg text-white px-4 py-2 rounded-full hover:bg-teal-700 transition">
                                <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                            </button>
                            <button class="text-gray-400 hover:text-teal-600 transition">
                                <i class="far fa-eye text-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/product3/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm">Out of Stock</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Pendant Light Fixture</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(4.0)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-gray-900">$189</span>
                        </div>
                        <div class="flex justify-between">
                            <button class="text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                            <button class="bg-gray-300 text-gray-500 px-4 py-2 rounded-full cursor-not-allowed" disabled>
                                <i class="fas fa-shopping-cart mr-2"></i>Out of Stock
                            </button>
                            <button class="text-gray-400 hover:text-teal-600 transition">
                                <i class="far fa-eye text-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/product4/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm">In Stock</span>
                        <span class="absolute bottom-4 left-4 bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-fire mr-1"></i>Only 3 left
                        </span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Luxury Sofa Set</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(4.7)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-gray-900">$1,299</span>
                        </div>
                        <div class="flex justify-between">
                            <button class="text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                            <button class="teal-bg text-white px-4 py-2 rounded-full hover:bg-teal-700 transition">
                                <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                            </button>
                            <button class="text-gray-400 hover:text-teal-600 transition">
                                <i class="far fa-eye text-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROMOTION SECTION -->
    <section class="py-16 bg-gradient-to-r from-teal-600 to-cyan-600">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-2xl">
                <div class="text-center">
                    <div class="inline-block">
                        <span class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4 inline-block">
                            <i class="fas fa-bolt mr-2"></i>LIMITED TIME
                        </span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Super Sale</h2>
                    <p class="text-xl text-gray-600 mb-8">Up to 50% off on selected items</p>
                    
                    <!-- Countdown Timer (Design Only) -->
                    <div class="flex justify-center space-x-4 mb-8">
                        <div class="bg-gray-100 rounded-xl p-4">
                            <div class="text-3xl font-bold text-gray-900">02</div>
                            <div class="text-sm text-gray-600">Days</div>
                        </div>
                        <div class="bg-gray-100 rounded-xl p-4">
                            <div class="text-3xl font-bold text-gray-900">14</div>
                            <div class="text-sm text-gray-600">Hours</div>
                        </div>
                        <div class="bg-gray-100 rounded-xl p-4">
                            <div class="text-3xl font-bold text-gray-900">27</div>
                            <div class="text-sm text-gray-600">Minutes</div>
                        </div>
                        <div class="bg-gray-100 rounded-xl p-4">
                            <div class="text-3xl font-bold text-gray-900">45</div>
                            <div class="text-sm text-gray-600">Seconds</div>
                        </div>
                    </div>
                    
                    <button class="bg-red-500 text-white px-12 py-4 rounded-full text-lg font-semibold hover:bg-red-600 transition transform hover:scale-105">
                        Shop Deals Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BEST SELLING PRODUCTS -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Best Selling Products</h2>
                <p class="text-gray-600">Our most popular items</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Best Seller 1 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/bestseller1/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-crown mr-1"></i>Best Seller
                        </span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Scandinavian Coffee Table</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(4.9)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$799</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$599</span>
                            </div>
                        </div>
                        <button class="w-full teal-bg text-white py-2 rounded-full hover:bg-teal-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Best Seller 2 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/bestseller2/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-crown mr-1"></i>Best Seller
                        </span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Executive Leather Chair</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(4.6)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$1,299</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$899</span>
                            </div>
                        </div>
                        <button class="w-full teal-bg text-white py-2 rounded-full hover:bg-teal-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Best Seller 3 -->
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition">
                    <div class="relative">
                        <img src="https://picsum.photos/seed/bestseller3/300/300.jpg" alt="Product" class="w-full h-64 object-cover rounded-t-2xl">
                        <span class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">
                            <i class="fas fa-crown mr-1"></i>Best Seller
                        </span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Modern Floor Lamp</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(4.8)</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-gray-400 line-through text-sm">$349</span>
                                <span class="text-2xl font-bold text-gray-900 ml-2">$249</span>
                            </div>
                        </div>
                        <button class="w-full teal-bg text-white py-2 rounded-full hover:bg-teal-700 transition">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CUSTOMER REVIEWS -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-gray-600">Real reviews from real customers</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Review 1 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://picsum.photos/seed/customer1/60/60.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-sm text-gray-600">Verified Client</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700">
                        "Absolutely love my new dining table! The quality is exceptional and it arrived exactly as described. Customer service was top-notch throughout the process."
                    </p>
                    <button class="mt-4 text-teal-600 hover:text-teal-700 text-sm font-semibold">
                        Write a Review
                    </button>
                </div>

                <!-- Review 2 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://picsum.photos/seed/customer2/60/60.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Michael Chen</h4>
                            <p class="text-sm text-gray-600">Verified Client</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-700">
                        "Great selection of modern furniture. The office chair I purchased has improved my workspace significantly. Fast shipping and easy assembly!"
                    </p>
                    <button class="mt-4 text-teal-600 hover:text-teal-700 text-sm font-semibold">
                        Write a Review
                    </button>
                </div>

                <!-- Review 3 -->
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="flex items-center mb-4">
                        <img src="https://picsum.photos/seed/customer3/60/60.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900">Emily Rodriguez</h4>
                            <p class="text-sm text-gray-600">Verified Client</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700">
                        "The sofa set exceeded my expectations! Perfect comfort and style. The delivery team was professional and handled everything with care."
                    </p>
                    <button class="mt-4 text-teal-600 hover:text-teal-700 text-sm font-semibold">
                        Write a Review
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWSLETTER SECTION -->
    <section class="py-16 bg-gradient-to-r from-teal-600 to-cyan-600">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-3xl font-bold text-white mb-4">Get updates on new furniture</h2>
                <p class="text-teal-100 mb-8">
                    Subscribe to our newsletter and be the first to know about new arrivals, exclusive deals, and design tips.
                </p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Enter your email address" 
                        class="flex-1 px-6 py-3 rounded-full border-0 focus:outline-none focus:ring-4 focus:ring-teal-300"
                        required
                    >
                    <button type="submit" class="bg-white text-teal-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- About Column -->
                <div class="lg:col-span-2">
                    <h3 class="text-2xl font-bold mb-4 teal-primary">Furnish</h3>
                    <p class="text-gray-400 mb-4">
                        Your trusted partner in creating beautiful, functional spaces. We bring quality furniture and exceptional design to homes everywhere.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-teal-400 transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-teal-400 transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-teal-400 transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-teal-400 transition">
                            <i class="fab fa-pinterest text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Shop Categories -->
                <div>
                    <h4 class="font-semibold mb-4">Shop Categories</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Living Room</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Bedroom</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Office</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Outdoor</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Lighting</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div>
                    <h4 class="font-semibold mb-4">Customer Service</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Size Guide</a></li>
                    </ul>
                </div>

                <!-- Admin Panels -->
                <div>
                    <h4 class="font-semibold mb-4">Dashboard</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Seller Dashboard</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Admin Panel</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Track Order</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">My Account</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-teal-400 transition">Wishlist</a></li>
                    </ul>
                </div>
            </div>

            <!-- Order Status Examples -->
            <div class="mt-12 pt-8 border-t border-gray-800">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="flex flex-wrap gap-2 mb-4 md:mb-0">
                        <span class="px-3 py-1 bg-yellow-500 text-white text-xs rounded-full">Pending</span>
                        <span class="px-3 py-1 bg-blue-500 text-white text-xs rounded-full">Paid</span>
                        <span class="px-3 py-1 bg-purple-500 text-white text-xs rounded-full">Shipped</span>
                        <span class="px-3 py-1 bg-green-500 text-white text-xs rounded-full">Delivered</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">Client</span>
                        <span class="px-3 py-1 bg-green-100 text-green-600 text-xs rounded-full">Seller</span>
                        <span class="px-3 py-1 bg-red-100 text-red-600 text-xs rounded-full">Admin</span>
                        <span class="px-3 py-1 bg-purple-100 text-purple-600 text-xs rounded-full">Moderator</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        © 2024 Furnish. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
