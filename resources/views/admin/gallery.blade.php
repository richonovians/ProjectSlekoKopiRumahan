@extends('layouts.admin')

@section('title', 'Kelola Gallery')
@section('page_title', 'Manajemen Galeri Foto')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Cari foto/caption..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition shadow-sm">
            </div>
            
            <select class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto shadow-sm">
                <option value="">Semua Album</option>
                <option value="ambience">Ambience Cafe</option>
                <option value="produk">Produk & Menu</option>
                <option value="event">Event & Promo</option>
            </select>
        </div>

        <a href="{{ route('admin.gallery.create') }}" class="w-full md:w-auto bg-coffee-dark hover:bg-[#005bb5] text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-md flex items-center justify-center group">
            <i class="fa-solid fa-cloud-arrow-up mr-2 group-hover:-translate-y-1 transition-transform"></i> Upload Foto
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
            <div class="relative h-56 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=600&q=80" alt="Ambience" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-3 rounded-md">
                    Ambience Cafe
                </span>

                <div class="absolute inset-0 bg-[#023A73]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-[2px]">
                    <button class="bg-white text-blue-600 w-10 h-10 rounded-full hover:bg-blue-50 transition transform hover:scale-110 hover:shadow-lg flex items-center justify-center" title="Edit Data">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="bg-white text-red-600 w-10 h-10 rounded-full hover:bg-red-50 transition transform hover:scale-110 hover:shadow-lg flex items-center justify-center" title="Hapus Foto">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>
            
            <div class="p-4">
                <h3 class="font-bold text-coffee-dark text-sm truncate mb-1">Sudut Nyaman Untuk Kerja</h3>
                <div class="flex justify-between items-center mt-3">
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-regular fa-clock mr-1.5"></i> 06 Apr 2026</p>
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-solid fa-weight-hanging mr-1.5"></i> 1.2 MB</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
            <div class="relative h-56 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?auto=format&fit=crop&w=600&q=80" alt="Produk" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-3 rounded-md">
                    Produk & Menu
                </span>

                <div class="absolute inset-0 bg-[#023A73]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-[2px]">
                    <button class="bg-white text-blue-600 w-10 h-10 rounded-full hover:bg-blue-50 transition transform hover:scale-110 flex items-center justify-center">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="bg-white text-red-600 w-10 h-10 rounded-full hover:bg-red-50 transition transform hover:scale-110 flex items-center justify-center">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-coffee-dark text-sm truncate mb-1">Sarapan Toast & Kopi</h3>
                <div class="flex justify-between items-center mt-3">
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-regular fa-clock mr-1.5"></i> 05 Apr 2026</p>
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-solid fa-weight-hanging mr-1.5"></i> 850 KB</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
            <div class="relative h-56 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?auto=format&fit=crop&w=600&q=80" alt="Event" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-3 rounded-md">
                    Event & Promo
                </span>

                <div class="absolute inset-0 bg-[#023A73]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-[2px]">
                    <button class="bg-white text-blue-600 w-10 h-10 rounded-full hover:bg-blue-50 transition transform hover:scale-110 flex items-center justify-center">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="bg-white text-red-600 w-10 h-10 rounded-full hover:bg-red-50 transition transform hover:scale-110 flex items-center justify-center">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-coffee-dark text-sm truncate mb-1">Barista Menyeduh Kopi</h3>
                <div class="flex justify-between items-center mt-3">
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-regular fa-clock mr-1.5"></i> 02 Apr 2026</p>
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-solid fa-weight-hanging mr-1.5"></i> 1.5 MB</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
            <div class="relative h-56 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1445116572660-236099ceec33?auto=format&fit=crop&w=600&q=80" alt="Ambience" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-3 rounded-md">
                    Ambience Cafe
                </span>

                <div class="absolute inset-0 bg-[#023A73]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-[2px]">
                    <button class="bg-white text-blue-600 w-10 h-10 rounded-full hover:bg-blue-50 transition transform hover:scale-110 flex items-center justify-center">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="bg-white text-red-600 w-10 h-10 rounded-full hover:bg-red-50 transition transform hover:scale-110 flex items-center justify-center">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-coffee-dark text-sm truncate mb-1">Dekorasi Meja Kopi</h3>
                <div class="flex justify-between items-center mt-3">
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-regular fa-clock mr-1.5"></i> 28 Mar 2026</p>
                    <p class="text-[10px] text-gray-400 flex items-center"><i class="fa-solid fa-weight-hanging mr-1.5"></i> 920 KB</p>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-8 flex justify-center">
        <div class="flex space-x-1 bg-white p-1 rounded-lg shadow-sm border border-gray-100">
            <button class="px-3 py-1.5 rounded-md text-xs text-gray-400 cursor-not-allowed font-medium"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="px-3 py-1.5 rounded-md text-xs bg-coffee-dark text-white font-medium">1</button>
            <button class="px-3 py-1.5 rounded-md text-xs text-gray-600 hover:bg-gray-50 transition font-medium">2</button>
            <button class="px-3 py-1.5 rounded-md text-xs text-gray-600 hover:bg-gray-50 transition font-medium">3</button>
            <button class="px-3 py-1.5 rounded-md text-xs text-gray-600 hover:bg-gray-50 transition font-medium"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>

@endsection