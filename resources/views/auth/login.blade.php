<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sleko Kopi Rumahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        coffee: { primary: '#5881c8', dark: '#023A73' }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased text-gray-800 bg-white">

    <div class="flex min-h-screen">
        
        <div class="hidden lg:flex lg:w-1/2 relative bg-coffee-dark items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-black/30 z-10"></div>
            <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?auto=format&fit=crop&w=1000&q=80" alt="Coffee Setup" class="absolute inset-0 w-full h-full object-cover">
            
            <div class="relative z-20 text-center text-white px-12">
                <h2 class="font-['Rajdhani'] text-6xl font-bold leading-none mb-2">sleko</h2>
                <p class="tracking-[0.3em] text-sm uppercase mb-8 opacity-90">kopi rumahan</p>
                <p class="font-light text-lg opacity-80 max-w-md mx-auto">Awali harimu dengan semangat baru dan secangkir inspirasi dari biji kopi pilihan.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
            <div class="w-full max-w-md">
                
                <div class="lg:hidden text-center mb-10">
                    <h2 class="font-['Rajdhani'] text-5xl font-bold text-coffee-dark leading-none">sleko</h2>
                    <p class="tracking-[0.2em] text-[10px] uppercase text-gray-500 font-semibold mt-1">kopi rumahan</p>
                </div>

                <div class="mb-10 text-center lg:text-left">
                    <h1 class="text-3xl font-bold text-coffee-dark mb-2">Selamat Datang Kembali</h1>
                    <p class="text-sm text-gray-500">Silahkan masukkan kredensial Anda untuk masuk ke sistem.</p>
                </div>

                <x-auth-session-status class="mb-4 text-green-600 text-sm font-semibold p-3 bg-green-50 rounded-lg" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@sleko.com" 
                                class="w-full pl-11 pr-4 py-3 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" 
                                required autofocus autocomplete="username">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-semibold text-coffee-primary hover:text-coffee-dark transition">Lupa Sandi?</a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••" 
                                class="w-full pl-11 pr-10 py-3 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" 
                                required autocomplete="current-password">
                            
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-coffee-primary transition">
                                <i id="eye-icon" class="fa-solid fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="remember_me" name="remember" class="w-4 h-4 text-coffee-primary bg-gray-100 border-gray-300 rounded focus:ring-coffee-primary">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600 cursor-pointer">{{ __('Ingat saya di perangkat ini') }}</label>
                    </div>

                    <button type="submit" class="w-full bg-coffee-dark hover:bg-[#005bb5] text-white font-bold py-3.5 px-4 rounded-lg shadow-md transition transform hover:-translate-y-0.5">
                        {{ __('Log in') }}
                    </button>
                </form>

                {{-- <p class="mt-8 text-center text-sm text-gray-500">
                    Belum punya akun? 
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-bold text-coffee-primary hover:text-coffee-dark transition">Daftar sekarang</a>
                    @endif
                </p> --}}
                
                <div class="mt-12 text-center">
                    <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-gray-600 transition flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda Website
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>
</html>