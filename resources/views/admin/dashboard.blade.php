@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Overview Dashboard')

@section('content')
    <div class="bg-gradient-to-r from-coffee-dark to-[#005bb5] rounded-2xl p-8 mb-8 text-white shadow-lg relative overflow-hidden">
        <div class="relative z-10 w-full md:w-2/3">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, Super Admin! 👋</h2>
            <p class="text-sm text-blue-100 mb-6 leading-relaxed">
                Ini adalah pusat kendali Anda. Pantau aktivitas website, tambahkan menu kopi terbaru, unggah foto galeri yang menarik, dan kelola akses tim admin di sini.
            </p>
            <a href="{{ route('admin.menu.create') }}" class="inline-block bg-white text-coffee-dark hover:bg-gray-100 px-6 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wide transition shadow-sm">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Menu Baru
            </a>
        </div>
        <i class="fa-solid fa-mug-hot absolute -bottom-10 -right-10 text-[180px] text-white opacity-10 transform -rotate-12"></i>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-coffee-primary transition duration-300">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Total Menu</p>
                <h3 class="text-3xl font-bold text-coffee-dark">48</h3>
                <p class="text-[10px] text-green-500 mt-2 font-medium"><i class="fa-solid fa-arrow-trend-up mr-1"></i> +3 bulan ini</p>
            </div>
            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-coffee-primary group-hover:scale-110 transition duration-300">
                <i class="fa-solid fa-mug-hot text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-[#8A735E] transition duration-300">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Foto Galeri</p>
                <h3 class="text-3xl font-bold text-coffee-dark">124</h3>
                <p class="text-[10px] text-green-500 mt-2 font-medium"><i class="fa-solid fa-arrow-trend-up mr-1"></i> +12 foto baru</p>
            </div>
            <div class="w-14 h-14 rounded-full bg-[#8A735E]/10 flex items-center justify-center text-[#8A735E] group-hover:scale-110 transition duration-300">
                <i class="fa-solid fa-images text-2xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-orange-400 transition duration-300">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Admin Aktif</p>
                <h3 class="text-3xl font-bold text-coffee-dark">4</h3>
                <p class="text-[10px] text-gray-500 mt-2 font-medium">Superadmin & Admin</p>
            </div>
            <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center text-orange-500 group-hover:scale-110 transition duration-300">
                <i class="fa-solid fa-user-shield text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-coffee-dark mb-6">Akses Cepat</h3>
            <div class="grid grid-cols-2 gap-4">
                
                <a href="{{ route('admin.menu.create') }}" class="border border-gray-200 rounded-lg p-4 text-center hover:bg-coffee-light hover:border-coffee-primary transition group cursor-pointer">
                    <i class="fa-solid fa-mug-hot text-coffee-primary text-2xl mb-3 group-hover:scale-110 transition"></i>
                    <p class="text-xs font-semibold text-gray-700">Tambah Menu</p>
                </a>
                
                <a href="{{ route('admin.gallery.create') }}" class="border border-gray-200 rounded-lg p-4 text-center hover:bg-coffee-light hover:border-coffee-primary transition group cursor-pointer">
                    <i class="fa-solid fa-image text-[#8A735E] text-2xl mb-3 group-hover:scale-110 transition"></i>
                    <p class="text-xs font-semibold text-gray-700">Upload Foto</p>
                </a>
                
                @auth
                    @if(auth()->user()->role === 'superadmin')
                        <a href="{{ route('admin.users.create') }}" class="border border-gray-200 rounded-lg p-4 text-center hover:bg-coffee-light hover:border-coffee-primary transition group cursor-pointer">
                            <i class="fa-solid fa-user-plus text-orange-500 text-2xl mb-3 group-hover:scale-110 transition"></i>
                            <p class="text-xs font-semibold text-gray-700">Tambah Admin</p>
                        </a>
                    @endif
                @endauth
                
                <a href="{{ route('home') }}" target="_blank" class="border border-gray-200 rounded-lg p-4 text-center hover:bg-coffee-light hover:border-coffee-primary transition group cursor-pointer">
                    <i class="fa-solid fa-globe text-gray-400 text-2xl mb-3 group-hover:scale-110 transition"></i>
                    <p class="text-xs font-semibold text-gray-700">Lihat Website</p>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-coffee-dark">Admin Terdaftar</h3>
                <a href="{{ route('admin.users') }}" class="text-xs font-medium text-coffee-primary hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 border border-transparent hover:border-gray-100 transition">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Super+Admin&background=023A73&color=fff" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-gray-800">Super Admin</p>
                            <p class="text-[10px] text-gray-500">superadmin@sleko.com</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded-full">Superadmin</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 border border-transparent hover:border-gray-100 transition">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=5881c8&color=fff" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-semibold text-gray-800">Budi Santoso</p>
                            <p class="text-[10px] text-gray-500">budi@sleko.com</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold rounded-full">Admin</span>
                </div>
            </div>
        </div>

    </div>
@endsection