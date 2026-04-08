@extends('layouts.admin')

@section('title', 'Kelola Menu')
@section('page_title', 'Manajemen Menu')

@section('content')
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Cari nama menu..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition">
            </div>
            
            <select class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto">
                <option value="">Semua Kategori</option>
                <option value="signature">Signature Drinks</option>
                <option value="coffee">Coffee</option>
                <option value="non-coffee">Non-Coffee</option>
                <option value="pastry">Pastry & Bites</option>
            </select>
        </div>

        <a href="{{ route('admin.menu.create') }}" class="w-full md:w-auto bg-coffee-dark hover:bg-[#005bb5] text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm flex items-center justify-center">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Menu
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold w-16">ID</th>
                        <th class="px-6 py-4 font-semibold">Menu</th>
                        <th class="px-6 py-4 font-semibold">Kategori</th>
                        <th class="px-6 py-4 font-semibold">Harga</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    
                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">#01</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=150&q=80" alt="Latte Artisan" class="w-12 h-12 rounded-lg object-cover shadow-sm border border-gray-100">
                                <div class="ml-4">
                                    <p class="font-bold text-coffee-dark">Latte Artisan</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5 line-clamp-1 w-48">Perpaduan espresso premium dengan susu steamed...</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-[#023A73]/10 text-[#023A73]">
                                Signature Drinks
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800">Rp 35.000</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase tracking-widest">
                                Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-3 opacity-70 group-hover:opacity-100 transition">
                                <button class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-1.5 rounded-md transition" title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-md transition" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">#02</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1551887373-6edba6dac3af?auto=format&fit=crop&w=150&q=80" alt="Classic Robusta" class="w-12 h-12 rounded-lg object-cover shadow-sm border border-gray-100">
                                <div class="ml-4">
                                    <p class="font-bold text-coffee-dark">Classic Robusta</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5 line-clamp-1 w-48">Kopi robusta pilihan yang diseduh dengan teknik khusus...</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-600">
                                Coffee
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800">Rp 28.000</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase tracking-widest">
                                Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-3 opacity-70 group-hover:opacity-100 transition">
                                <button class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-1.5 rounded-md transition" title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-md transition" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">#03</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1d4075c6f1?auto=format&fit=crop&w=150&q=80" alt="Butter Croissant" class="w-12 h-12 rounded-lg object-cover shadow-sm border border-gray-100">
                                <div class="ml-4">
                                    <p class="font-bold text-coffee-dark">Butter Croissant</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5 line-clamp-1 w-48">Croissant klasik bergaya Prancis dengan tekstur flaky...</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-[#8A735E]/10 text-[#8A735E]">
                                Pastry & Bites
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800">Rp 25.000</td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-gray-200 text-gray-600 uppercase tracking-widest">
                                Draft
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-3 opacity-70 group-hover:opacity-100 transition">
                                <button class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-1.5 rounded-md transition" title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-md transition" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="bg-white border-t border-gray-100 px-6 py-4 flex items-center justify-between sm:flex-row flex-col gap-4">
            <p class="text-xs text-gray-500">Menampilkan <span class="font-bold text-gray-800">1</span> sampai <span class="font-bold text-gray-800">3</span> dari <span class="font-bold text-gray-800">48</span> menu</p>
            <div class="flex space-x-1">
                <button class="px-3 py-1 border border-gray-200 rounded text-xs text-gray-400 cursor-not-allowed">Prev</button>
                <button class="px-3 py-1 border border-coffee-primary bg-coffee-primary text-white rounded text-xs">1</button>
                <button class="px-3 py-1 border border-gray-200 hover:bg-gray-50 rounded text-xs text-gray-600 transition">2</button>
                <button class="px-3 py-1 border border-gray-200 hover:bg-gray-50 rounded text-xs text-gray-600 transition">3</button>
                <span class="px-2 py-1 text-xs text-gray-400">...</span>
                <button class="px-3 py-1 border border-gray-200 hover:bg-gray-50 rounded text-xs text-gray-600 transition">Next</button>
            </div>
        </div>
    </div>

@endsection