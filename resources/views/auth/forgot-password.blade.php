<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Sleko Kopi Rumahan</title>
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
            <div class="absolute inset-0 bg-black/40 z-10"></div>
            <img src="https://images.unsplash.com/photo-1507133750070-4cbff416df98?auto=format&fit=crop&w=1000&q=80" alt="Barista Pouring Coffee" class="absolute inset-0 w-full h-full object-cover">
            
            <div class="relative z-20 text-center text-white px-12">
                <div class="mb-8 opacity-90 inline-block bg-white/20 p-4 rounded-full backdrop-blur-sm">
                    <i class="fa-solid fa-key text-4xl"></i>
                </div>
                <h2 class="font-['Rajdhani'] text-5xl font-bold leading-none mb-4">Pemulihan Akun</h2>
                <p class="font-light text-base opacity-80 max-w-md mx-auto leading-relaxed">Jangan khawatir, kami akan membantu Anda mendapatkan kembali akses ke dashboard Sleko.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
            <div class="w-full max-w-md">
                
                <div class="lg:hidden text-center mb-8">
                    <h2 class="font-['Rajdhani'] text-5xl font-bold text-coffee-dark leading-none">sleko</h2>
                    <p class="tracking-[0.2em] text-[10px] uppercase text-gray-500 font-semibold mt-1">kopi rumahan</p>
                </div>

                <div class="mb-8 text-center lg:text-left">
                    <h1 class="text-3xl font-bold text-coffee-dark mb-3">Lupa Kata Sandi?</h1>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        {{ __('Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan reset kata sandi yang memungkinkan Anda memilih kata sandi baru.') }}
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-semibold rounded-r-lg flex items-start">
                        <i class="fa-solid fa-circle-check mt-0.5 mr-3 text-green-500"></i>
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email Terdaftar</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@gmail.com" 
                                class="w-full pl-11 pr-4 py-3 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" 
                                required autofocus>
                        </div>
                        
                        @error('email')
                            <p class="text-red-500 text-xs mt-1 font-medium flex items-center">
                                <i class="fa-solid fa-circle-exclamation mr-1.5"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-coffee-dark hover:bg-[#005bb5] text-white font-bold py-3.5 px-4 rounded-lg shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center">
                        <i class="fa-regular fa-paper-plane mr-2"></i> {{ __('Kirim Tautan Reset Sandi') }}
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-sm text-gray-500">
                        Ingat kata sandi Anda? 
                        <a href="{{ route('login') }}" class="font-bold text-coffee-primary hover:text-coffee-dark transition">Kembali ke Login</a>
                    </p>
                </div>

            </div>
        </div>

    </div>

</body>
</html>