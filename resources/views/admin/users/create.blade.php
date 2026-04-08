@extends('layouts.admin')

@section('title', 'Tambah Admin Baru')
@section('page_title', 'Tambah Pengguna')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.users') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-coffee-dark transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Admin
        </a>
    </div>

    <form action="#" method="POST">
        @csrf
        
        <div class="flex flex-col lg:flex-row gap-6">
            
            <div class="lg:w-2/3 flex flex-col gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-coffee-dark mb-6 border-b border-gray-100 pb-4">Informasi Akun</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" placeholder="Nama admin baru" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" placeholder="contoh@sleko.com" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-2">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="••••••••" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-coffee-primary transition">
                                    <i class="fa-solid fa-eye text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                        </div>
                    </div>
                    <p class="text-[10px] text-gray-400">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka.</p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-coffee-dark mb-6 border-b border-gray-100 pb-4">Hak Akses Pengguna</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="relative flex p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition group has-[:checked]:border-coffee-primary has-[:checked]:bg-blue-50/30">
                            <input type="radio" name="role" value="admin" class="mt-1 w-4 h-4 text-coffee-primary border-gray-300 focus:ring-coffee-primary" checked>
                            <div class="ml-4">
                                <span class="block text-sm font-bold text-gray-800">Admin</span>
                                <span class="block text-[11px] text-gray-500 mt-1 leading-relaxed">Dapat mengelola konten website seperti menu makanan, minuman, dan galeri foto.</span>
                            </div>
                        </label>

                        <label class="relative flex p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition group has-[:checked]:border-coffee-primary has-[:checked]:bg-blue-50/30">
                            <input type="radio" name="role" value="superadmin" class="mt-1 w-4 h-4 text-coffee-primary border-gray-300 focus:ring-coffee-primary">
                            <div class="ml-4">
                                <span class="block text-sm font-bold text-[#023A73] flex items-center">
                                    Superadmin <i class="fa-solid fa-crown ml-2 text-[10px]"></i>
                                </span>
                                <span class="block text-[11px] text-gray-500 mt-1 leading-relaxed">Akses penuh ke seluruh sistem, termasuk manajemen admin lain dan pengaturan website.</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/3 flex flex-col gap-6">
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Status Akun</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-gray-700">Aktifkan Sekarang</span>
                                <span class="text-[10px] text-gray-400">Admin bisa langsung login</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="status" value="active" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-coffee-primary"></div>
                            </label>
                        </div>

                        <div class="bg-blue-50 border-l-4 border-coffee-primary p-3 rounded-r-lg">
                            <div class="flex">
                                <i class="fa-solid fa-circle-info text-coffee-primary mt-0.5 mr-3 text-sm"></i>
                                <p class="text-[10px] text-blue-800 leading-relaxed font-medium">
                                    Email konfirmasi akan dikirimkan secara otomatis ke alamat email yang didaftarkan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full bg-coffee-dark hover:bg-[#005bb5] text-white font-semibold py-3 px-4 rounded-lg shadow-md transition text-sm flex items-center justify-center">
                        <i class="fa-solid fa-user-check mr-2"></i> Daftarkan Admin
                    </button>
                    <a href="{{ route('admin.users') }}" class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-lg shadow-sm transition text-center text-sm">
                        Batal
                    </a>
                </div>

                <div class="text-center px-4">
                    <p class="text-[10px] text-gray-400 italic">
                        <i class="fa-solid fa-shield-halved mr-1"></i> Seluruh aktivitas pendaftaran admin baru akan tercatat dalam log audit sistem demi keamanan.
                    </p>
                </div>

            </div>
        </div>
    </form>

@endsection