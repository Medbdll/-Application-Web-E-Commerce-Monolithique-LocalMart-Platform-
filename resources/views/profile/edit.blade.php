@extends('layouts.client-layout')

@section('title', 'Profile')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'neon-green': '#39FF14',
                        'neon-blue': '#00F0FF',
                        'dark-bg': '#050505',
                        'card-bg': '#121212',
                        'vortexGreen': '#39FF14',
                    },
                    fontFamily: {
                        'sci-fi': ['Orbitron', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                        'display': ['Orbitron', 'sans-serif'],
                    }
                }
            }
        }
    </script>
<main class="container mx-auto px-6 py-12 flex-grow">
        
        <div class="mb-12">
            <h1 class="font-sci-fi text-4xl md:text-5xl font-bold uppercase mb-2">
                User <span class="text-neon-green">Protocol</span>
            </h1>
            <p class="text-gray-400">Manage your identity and security settings.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-card-bg border border-gray-800 p-8 text-center flex flex-col items-center">
                    <div class="relative mb-6">
                        <div class="w-32 h-32 rounded-full border-2 border-neon-green p-1">
                            <img src="https://placehold.co/128x128/111/39FF14?text=User" alt="Avatar" class="w-full h-full rounded-full object-cover grayscale hover:grayscale-0 transition duration-500">
                        </div>
                        <button class="absolute bottom-0 right-0 bg-neon-green text-black p-2 rounded-full hover:bg-white transition">
                            <i class="fa-solid fa-camera text-sm"></i>
                        </button>
                    </div>
                    <h2 class="font-sci-fi text-xl font-bold">VORTEX_PILOT_01</h2>
                    <p class="text-gray-500 text-sm mb-4">Member since August 2025</p>
                    <div class="inline-block bg-neon-green/10 border border-neon-green/30 text-neon-green px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">
                        Pro Tier
                    </div>
                </div>

                <div class="bg-card-bg border border-gray-800 overflow-hidden">
                    <a href="#" class="flex items-center gap-4 px-6 py-4 text-neon-green bg-neon-green/5 border-l-4 border-neon-green">
                        <i class="fa-solid fa-user-gear"></i> Account Details
                    </a>
                    <a href="#" class="flex items-center gap-4 px-6 py-4 text-gray-400 hover:text-white hover:bg-white/5 transition border-l-4 border-transparent">
                        <i class="fa-solid fa-shield-halved"></i> Security
                    </a>
                    <a href="#" class="flex items-center gap-4 px-6 py-4 text-gray-400 hover:text-white hover:bg-white/5 transition border-l-4 border-transparent">
                        <i class="fa-solid fa-credit-card"></i> Payment Methods
                    </a>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-card-bg border border-gray-800 p-8">
                    <h3 class="font-sci-fi text-2xl font-bold mb-8 flex items-center gap-3">
                        <span class="w-2 h-6 bg-neon-green"></span>
                        Personal Information
                    </h3>

                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Full Name</label>
                                <input type="text" value="Anas Al-Vortox" class="w-full bg-black border border-gray-800 px-4 py-3 text-white focus:border-neon-green transition outline-none rounded-sm">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Email Address</label>
                                <input type="email" value="pilot01@vortex.ma" class="w-full bg-black border border-gray-800 px-4 py-3 text-white focus:border-neon-green transition outline-none rounded-sm">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Shipping Address</label>
                            <input type="text" value="Boulevard Prince Sidi Mohammed, Nador" class="w-full bg-black border border-gray-800 px-4 py-3 text-white focus:border-neon-green transition outline-none rounded-sm">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">City</label>
                                <input type="text" value="Nador" class="w-full bg-black border border-gray-800 px-4 py-3 text-white focus:border-neon-green transition outline-none rounded-sm">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Zip Code</label>
                                <input type="text" value="62000" class="w-full bg-black border border-gray-800 px-4 py-3 text-white focus:border-neon-green transition outline-none rounded-sm">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest text-gray-500 font-bold">Phone</label>
                                <input type="text" value="+212 605593734" class="w-full bg-black border border-gray-800 px-4 py-3 text-white focus:border-neon-green transition outline-none rounded-sm">
                            </div>
                        </div>

                        <div class="pt-8 border-t border-gray-800 flex justify-end gap-4">
                            <button type="button" class="px-8 py-3 text-sm font-sci-fi uppercase tracking-widest text-gray-400 hover:text-white transition">Cancel</button>
                            <button type="submit" class="px-8 py-3 bg-neon-green text-black font-bold font-sci-fi uppercase text-sm hover:bg-white transition">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
