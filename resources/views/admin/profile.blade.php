@extends('layouts.admin')

@section('title', 'Profil Saya')
@section('page_title', 'Pengaturan Profil')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-r from-coffee-dark to-[#005bb5]"></div>
                
                <div class="relative mt-8 mb-4 group">
                    <img id="profile-preview" src="https://ui-avatars.com/api/?name=Super+Admin&background=023A73&color=fff&size=150" alt="Profile" class="w-28 h-28 rounded-full object-cover border-4 border-white shadow-md relative z-10">
                    
                    <button onclick="document.getElementById('profile-upload').click()" class="absolute bottom-0 right-0 z-20 bg-white text-coffee-dark w-8 h-8 rounded-full shadow-md border border-gray-100 flex items-center justify-center hover:bg-gray-50 hover:text-coffee-primary transition transform hover:scale-110" title="Ubah Foto Profil">
                        <i class="fa-solid fa-camera text-xs"></i>
                    </button>
                    <input type="file" id="profile-upload" class="hidden" accept="image/jpeg, image/png" onchange="previewProfile(event)">
                </div>

                <h3 class="text-xl font-bold text-gray-800">Super Admin</h3>
                <p class="text-sm text-gray-500 mb-4">superadmin@sleko.com</p>
                
                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-[#023A73]/10 text-[#023A73] uppercase tracking-wider mb-6">
                    <i class="fa-solid fa-crown mr-1.5 text-[#023A73]"></i> Superadmin
                </span>

                <div class="w-full border-t border-gray-100 pt-4 text-left space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500 font-medium">Status</span>
                        <span class="text-green-600 font-bold text-xs"><span class="inline-block w-2 h-2 rounded-full bg-green-500 mr-1 animate-pulse"></span> Aktif</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500 font-medium">Bergabung</span>
                        <span class="text-gray-800 font-semibold text-xs">10 Jan 2026</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 flex flex-col gap-6">
            
            <form action="#" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                @csrf
                <h2 class="text-lg font-bold text-coffee-dark mb-6 border-b border-gray-100 pb-4">Informasi Dasar</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="Super Admin" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                        <input type="email" id="email" name="email" value="superadmin@sleko.com" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon (Opsional)</label>
                    <input type="tel" id="phone" name="phone" placeholder="Contoh: 081234567890" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-coffee-dark hover:bg-[#005bb5] text-white font-semibold py-2.5 px-6 rounded-lg shadow-sm transition text-sm flex items-center">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>

            <form action="#" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                @csrf
                <h2 class="text-lg font-bold text-coffee-dark mb-6 border-b border-gray-100 pb-4">Ubah Kata Sandi</h2>
                
                <div class="mb-5">
                    <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi Saat Ini</label>
                    <div class="relative w-full md:w-1/2">
                        <input type="password" id="current_password" name="current_password" placeholder="••••••••" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-coffee-primary transition">
                            <i class="fa-solid fa-eye text-xs"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                    <div>
                        <label for="new_password" class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi Baru</label>
                        <div class="relative">
                            <input type="password" id="new_password" name="new_password" placeholder="••••••••" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-coffee-primary transition">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Kata Sandi Baru</label>
                        <div class="relative">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="••••••••" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-coffee-primary transition">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <p class="text-[10px] text-gray-400 italic w-1/2 md:w-auto">
                        <i class="fa-solid fa-shield-halved mr-1"></i> Jangan bagikan kata sandi Anda kepada siapa pun.
                    </p>
                    <button type="submit" class="bg-coffee-dark hover:bg-[#005bb5] text-white font-semibold py-2.5 px-6 rounded-lg shadow-sm transition text-sm flex items-center">
                        <i class="fa-solid fa-key mr-2"></i> Update Password
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function previewProfile(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection