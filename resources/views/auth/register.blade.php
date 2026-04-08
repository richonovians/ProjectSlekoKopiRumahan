<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sleko Kopi Rumahan</title>
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
        
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 order-2 lg:order-1">
            <div class="w-full max-w-md">
                
                <div class="lg:hidden text-center mb-8">
                    <h2 class="font-['Rajdhani'] text-5xl font-bold text-coffee-dark leading-none">sleko</h2>
                    <p class="tracking-[0.2em] text-[10px] uppercase text-gray-500 font-semibold mt-1">kopi rumahan</p>
                </div>

                <div class="mb-8 text-center lg:text-left">
                    <h1 class="text-3xl font-bold text-coffee-dark mb-2">Buat Akun Baru</h1>
                    <p class="text-sm text-gray-500">Bergabunglah dengan tim kami untuk mengelola website.</p>
                </div>

                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-regular fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="name" name="name" placeholder="John Doe" class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" required autofocus>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" placeholder="contoh@sleko.com" class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" id="password" name="password" placeholder="••••••••" class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" required>
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fa-solid fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" required>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start mt-2">
                        <input type="checkbox" id="terms" name="terms" class="mt-1 w-4 h-4 text-coffee-primary bg-gray-100 border-gray-300 rounded focus:ring-coffee-primary" required>
                        <label for="terms" class="ml-2 text-[11px] text-gray-600 leading-relaxed cursor-pointer">
                            Saya menyetujui <a href="#" class="text-coffee-primary font-bold hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-coffee-primary font-bold hover:underline">Kebijakan Privasi</a> yang berlaku di Sleko Kopi Rumahan.
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-coffee-dark hover:bg-[#005bb5] text-white font-bold py-3.5 px-4 rounded-lg shadow-md transition transform hover:-translate-y-0.5 mt-4">
                        Daftarkan Akun
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-gray-500">
                    Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="font-bold text-coffee-primary hover:text-coffee-dark transition">Masuk di sini</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 relative bg-coffee-dark items-center justify-center overflow-hidden order-1 lg:order-2">
            <div class="absolute inset-0 bg-[#023A73]/40 z-10 mix-blend-multiply"></div>
            <img src="https://images.unsplash.com/photo-1559525839-b184a4d698c7?auto=format&fit=crop&w=1000&q=80" alt="Latte Art" class="absolute inset-0 w-full h-full object-cover">
            
            <div class="relative z-20 text-center text-white px-12">
                <i class="fa-solid fa-mug-hot text-5xl mb-6 opacity-90"></i>
                <h2 class="text-3xl font-bold mb-4">Bergabung Bersama Kami</h2>
                <p class="font-light text-sm opacity-90 max-w-sm mx-auto leading-relaxed">Kelola menu andalan, tampilkan galeri terbaik, dan berikan pengalaman digital tak terlupakan untuk pelanggan kita.</p>
            </div>
        </div>

    </div>

</body>
</html>