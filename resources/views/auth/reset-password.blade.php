<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi - Sleko Kopi Rumahan</title>
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
<body class="font-sans antialiased text-gray-800 bg-gray-50">

    <div class="flex min-h-screen items-center justify-center p-6">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            
            <div class="bg-coffee-dark p-8 text-center">
                <h2 class="font-['Rajdhani'] text-4xl font-bold text-white leading-none tracking-tight">sleko</h2>
                <p class="font-['Rajdhani'] font-medium tracking-[0.4em] text-[8px] text-blue-200 mt-1 uppercase">kopi rumahan</p>
                <div class="mt-4 inline-flex items-center justify-center w-12 h-12 rounded-full bg-white/10 backdrop-blur-sm text-white">
                    <i class="fa-solid fa-lock-open text-xl"></i>
                </div>
            </div>

            <div class="p-8">
                <div class="mb-6 text-center">
                    <h1 class="text-2xl font-bold text-gray-800">Reset Kata Sandi</h1>
                    <p class="text-sm text-gray-500 mt-1">Silakan masukkan kata sandi baru Anda.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-regular fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" 
                                class="w-full pl-11 pr-4 py-3 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" 
                                required readonly>
                        </div>
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Kata Sandi Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-key text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" 
                                required autofocus autocomplete="new-password">
                        </div>
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">Konfirmasi Kata Sandi Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-shield-check text-gray-400"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                                class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-gray-50 focus:bg-white" 
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-coffee-dark hover:bg-[#005bb5] text-white font-bold py-3.5 px-4 rounded-xl shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center">
                        <i class="fa-solid fa-rotate mr-2"></i> {{ __('Perbarui Kata Sandi') }}
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-gray-400 hover:text-coffee-primary transition flex items-center justify-center">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Batal dan kembali ke Login
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>