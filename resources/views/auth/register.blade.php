<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vortox - Create Account</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@400;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        neon: '#39FF14', 
                        darkbg: '#050505',
                        fieldbg: '#000000',
                    },
                    fontFamily: {
                        orbitron: ['Orbitron', 'sans-serif'],
                        rajdhani: ['Rajdhani', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .neon-glow { text-shadow: 0 0 10px rgba(57, 255, 20, 0.5); }
        .box-glow { box-shadow: 0 0 15px rgba(57, 255, 20, 0.3), inset 0 0 10px rgba(57, 255, 20, 0.1); }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #000; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #39FF14; }
    </style>
</head>
<body class="bg-darkbg text-white h-screen w-full flex overflow-hidden font-rajdhani selection:bg-neon selection:text-black">

    <div class="w-full lg:w-[45%] h-full flex flex-col justify-center px-8 sm:px-16 lg:px-24 xl:px-32 relative z-10 bg-black">
        
        <div class="absolute top-10 left-8 sm:left-16 lg:left-24 flex items-center space-x-2">
            <img src="assets/images/logoV.svg" class="h-6" alt="">
            <span class="text-neon text-2xl font-orbitron font-bold tracking-widest">VORTOX</span>
        </div>

        <div class="mt-10">
            <h1 class="text-3xl md:text-4xl font-orbitron font-medium tracking-wide mb-2 text-white uppercase">Create Account</h1>
            <p class="text-gray-400 text-sm mb-10 tracking-wide">Join the community and unleash your power.</p>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="relative group">
                    <input id="name" 
                           type="text" 
                           name="name" 
                           :value="old('name')" 
                           required 
                           autofocus 
                           autocomplete="name"
                           placeholder="FULL NAME" 
                           class="w-full bg-transparent border border-gray-700 text-white px-4 py-4 focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all duration-300 placeholder-gray-500 text-sm tracking-wider font-semibold">
                </div>

                <div class="relative group">
                    <input id="email" 
                           type="email" 
                           name="email" 
                           :value="old('email')" 
                           required 
                           autocomplete="username"
                           placeholder="EMAIL ADDRESS" 
                           class="w-full bg-transparent border border-gray-700 text-white px-4 py-4 focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all duration-300 placeholder-gray-500 text-sm tracking-wider font-semibold">
                </div>

                <div class="relative group">
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="new-password"
                           placeholder="PASSWORD" 
                           class="w-full bg-transparent border border-gray-700 text-white px-4 py-4 focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all duration-300 placeholder-gray-500 text-sm tracking-wider font-semibold">
                </div>

                <div class="relative group">
                    <input id="password_confirmation" 
                           type="password" 
                           name="password_confirmation" 
                           required 
                           autocomplete="new-password"
                           placeholder="CONFIRM PASSWORD" 
                           class="w-full bg-transparent border border-gray-700 text-white px-4 py-4 focus:outline-none focus:border-neon focus:ring-1 focus:ring-neon transition-all duration-300 placeholder-gray-500 text-sm tracking-wider font-semibold">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-neon text-black font-orbitron font-bold text-lg py-3 hover:opacity-90 hover:shadow-[0_0_20px_rgba(57,255,20,0.6)] transition-all duration-300 transform active:scale-[0.98]">
                        SIGN UP
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center text-sm text-gray-400">
                <span>Already have an account ? </span>
                <a href="{{ route('login') }}" class="text-neon font-bold hover:underline neon-glow">Log in</a>
            </div>
        </div>
    </div>

    <div class="hidden lg:flex w-[55%] h-full relative bg-black items-center justify-center overflow-hidden">
        
        <div class="absolute inset-0 opacity-40">
            <img src="assets/icons/login image.png" alt="" class="w-full h-full object-cover mix-blend-color-dodge filter grayscale contrast-150">
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-br from-black via-transparent to-black opacity-90 z-10"></div>
        <div class="absolute top-0 right-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-neon/10 via-transparent to-transparent z-10"></div>

        <div class="relative z-20 flex flex-col items-center justify-center h-full w-full">
            <div class="absolute top-16 left-16 text-left">
                <h2 class="text-5xl xl:text-6xl font-orbitron font-black text-white leading-tight">
                    START <br>
                    THE <br>
                    <span class="text-neon neon-glow">JOURNEY</span>
                </h2>
            </div>

            <div class="absolute top-[35%] left-[10%] xl:left-[15%] transform -translate-y-1/2 z-30">
                <div class="border border-neon bg-black/80 backdrop-blur-sm text-white px-6 py-3 rounded-lg relative box-glow">
                    <p class="font-orbitron text-xl tracking-wide">Next-Level!</p>
                    <div class="absolute -bottom-2 right-8 w-4 h-4 bg-black border-r border-b border-neon transform rotate-45"></div>
                </div>
            </div>

            <div class="relative mt-24 w-[85%] max-w-2xl">
                 <div class="absolute inset-0 bg-neon blur-[100px] opacity-20 rounded-full animate-pulse"></div>
                 <div class="absolute inset-0 z-30 mix-blend-overlay bg-gradient-to-t from-black via-transparent to-transparent"></div>
            </div>
            
            <svg class="absolute inset-0 w-full h-full z-10 opacity-30 pointer-events-none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,100 Q400,50 800,300 T1600,500" fill="none" stroke="#39FF14" stroke-width="2" />
                <path d="-100,200 Q300,400 900,100 T1500,600" fill="none" stroke="#39FF14" stroke-width="1" stroke-dasharray="10,10" />
            </svg>
        </div>
    </div>

</body>
</html>
