@extends('layouts.admin')

@section('title', 'Kelola Admin')
@section('page_title', 'Manajemen Pengguna')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text" placeholder="Cari nama atau email..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition shadow-sm">
            </div>
            
            <select class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto shadow-sm">
                <option value="">Semua Peran</option>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <a href="{{ route('admin.users.create') }}" class="w-full md:w-auto bg-coffee-dark hover:bg-[#005bb5] text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm flex items-center justify-center">
            <i class="fa-solid fa-user-plus mr-2"></i> Tambah Admin
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold w-12">No</th>
                        <th class="px-6 py-4 font-semibold">Pengguna</th>
                        <th class="px-6 py-4 font-semibold text-center">Peran</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold">Terakhir Login</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    
                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">1</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Super+Admin&background=023A73&color=fff" alt="Super Admin" class="w-10 h-10 rounded-full object-cover shadow-sm border border-gray-200">
                                <div class="ml-3">
                                    <p class="font-bold text-coffee-dark">Super Admin</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5">superadmin@sleko.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#023A73]/10 text-[#023A73] uppercase tracking-wider border border-[#023A73]/20">
                                <i class="fa-solid fa-crown mr-1.5 text-[#023A73]"></i> Superadmin
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md text-[10px] font-bold text-green-600">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5 animate-pulse"></span> Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-600">Hari ini, 09:41</p>
                            <p class="text-[10px] text-gray-400">IP: 192.168.1.1</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2 opacity-70 group-hover:opacity-100 transition">
                                <button class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-md transition" title="Edit Profil">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="text-gray-300 cursor-not-allowed p-2 rounded-md transition" title="Tidak dapat dihapus" disabled>
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">2</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=5881c8&color=fff" alt="Budi Santoso" class="w-10 h-10 rounded-full object-cover shadow-sm border border-gray-200">
                                <div class="ml-3">
                                    <p class="font-bold text-gray-800">Budi Santoso</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5">budi@sleko.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600 uppercase tracking-wider border border-gray-200">
                                <i class="fa-solid fa-user mr-1.5 text-gray-500"></i> Admin
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md text-[10px] font-bold text-green-600">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5"></span> Aktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-600">06 Apr 2026, 14:20</p>
                            <p class="text-[10px] text-gray-400">IP: 10.0.2.14</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2 opacity-70 group-hover:opacity-100 transition">
                                <button class="text-orange-400 hover:text-orange-600 hover:bg-orange-50 p-2 rounded-md transition" title="Reset Password">
                                    <i class="fa-solid fa-key"></i>
                                </button>
                                <button class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-md transition" title="Edit Profil">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-md transition" title="Hapus Admin">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">3</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Siti+Aminah&background=a0aec0&color=fff" alt="Siti Aminah" class="w-10 h-10 rounded-full object-cover shadow-sm border border-gray-200 grayscale">
                                <div class="ml-3">
                                    <p class="font-bold text-gray-500">Siti Aminah</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5">siti@sleko.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-500 uppercase tracking-wider border border-gray-200">
                                <i class="fa-solid fa-user mr-1.5 text-gray-400"></i> Admin
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md text-[10px] font-bold text-red-500">
                                <span class="w-2 h-2 rounded-full bg-red-400 mr-1.5"></span> Nonaktif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-400">20 Mar 2026, 09:15</p>
                            <p class="text-[10px] text-gray-300">IP: 192.168.1.45</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2 opacity-70 group-hover:opacity-100 transition">
                                <button class="text-green-500 hover:text-green-700 hover:bg-green-50 p-2 rounded-md transition" title="Aktifkan Akun">
                                    <i class="fa-solid fa-user-check"></i>
                                </button>
                                <button class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-md transition" title="Edit Profil">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-md transition" title="Hapus Admin">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="bg-white border-t border-gray-100 px-6 py-4 flex items-center justify-between sm:flex-row flex-col gap-4">
            <p class="text-xs text-gray-500">Menampilkan <span class="font-bold text-gray-800">1</span> sampai <span class="font-bold text-gray-800">3</span> dari <span class="font-bold text-gray-800">3</span> admin</p>
            <div class="flex space-x-1">
                <button class="px-3 py-1 border border-gray-200 rounded text-xs text-gray-400 cursor-not-allowed">Prev</button>
                <button class="px-3 py-1 border border-coffee-primary bg-coffee-primary text-white rounded text-xs">1</button>
                <button class="px-3 py-1 border border-gray-200 rounded text-xs text-gray-400 cursor-not-allowed">Next</button>
            </div>
        </div>
    </div>

@endsection