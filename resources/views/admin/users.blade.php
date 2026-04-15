@extends('layouts.admin')

@section('title', 'Kelola Admin')
@section('page_title', 'Manajemen Pengguna')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        
        <form id="filter-form" action="{{ route('admin.users') }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full md:w-auto" onsubmit="event.preventDefault();">
            
            <div class="relative flex items-center">
                <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-sm"></i>
                
                <input type="text" id="search-input" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="pl-10 pr-10 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition shadow-sm" autocomplete="off">
                
                <button type="button" id="clear-search" class="absolute right-3 text-gray-400 hover:text-red-500 transition {{ request('search') ? '' : 'hidden' }}" title="Hapus pencarian">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
            
            <select id="role-select" name="role" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto shadow-sm">
                <option value="">Semua Peran</option>
                <option value="superadmin" {{ request('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </form>

        <a href="{{ route('admin.users.create') }}" class="w-full md:w-auto bg-coffee-dark hover:bg-[#005bb5] text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm flex items-center justify-center">
            <i class="fa-solid fa-user-plus mr-2"></i> Tambah Admin
        </a>
    </div>

    <div id="table-container" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-opacity duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold w-12">No</th>
                        <th class="px-6 py-4 font-semibold">Pengguna</th>
                        <th class="px-6 py-4 font-semibold text-center">Peran</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold">Terdaftar Pada</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">
                            {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff" alt="{{ $user->name }}" class="w-10 h-10 rounded-full object-cover shadow-sm border border-gray-200">
                                <div class="ml-3">
                                    <p class="font-bold text-coffee-dark">{{ $user->name }}</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($user->role === 'superadmin')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#023A73]/10 text-[#023A73] uppercase tracking-wider border border-[#023A73]/20">
                                    <i class="fa-solid fa-crown mr-1.5 text-[#023A73]"></i> Superadmin
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600 uppercase tracking-wider border border-gray-200">
                                    <i class="fa-solid fa-user mr-1.5 text-gray-500"></i> Admin
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md text-[10px] font-bold text-green-600">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5 animate-pulse"></span> Aktif
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-600">{{ $user->created_at->format('d M Y') }}</p>
                            <p class="text-[10px] text-gray-400">{{ $user->created_at->format('H:i') }} WIB</p>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2 opacity-70 group-hover:opacity-100 transition">
                                
                                {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-md transition" title="Edit Profil">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a> --}}

                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user->id) ?? '#' }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-md transition" title="Hapus Admin">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                @else
                                    <button class="text-gray-300 cursor-not-allowed p-2 rounded-md transition" title="Anda tidak dapat menghapus akun sendiri" disabled>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                @endif

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            Data pengguna tidak ditemukan.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="bg-white border-t border-gray-100 px-6 py-4">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const roleSelect = document.getElementById('role-select');
            const tableContainer = document.getElementById('table-container');
            const clearSearchBtn = document.getElementById('clear-search');

            async function fetchNewData(url) {
                try {
                    tableContainer.classList.add('opacity-50', 'pointer-events-none');

                    const response = await fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    const html = await response.text();

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    const newTableContent = doc.getElementById('table-container').innerHTML;
                    tableContainer.innerHTML = newTableContent;

                    tableContainer.classList.remove('opacity-50', 'pointer-events-none');
                    window.history.pushState({}, '', url);

                    attachPaginationListeners();
                } catch (error) {
                    console.error('Gagal mengambil data:', error);
                    tableContainer.classList.remove('opacity-50', 'pointer-events-none');
                }
            }

            function triggerUpdate() {
                const search = searchInput.value;
                const role = roleSelect.value;
                
                const url = new URL(window.location.href);
                
                if (search) url.searchParams.set('search', search);
                else url.searchParams.delete('search');

                if (role) url.searchParams.set('role', role);
                else url.searchParams.delete('role');

                url.searchParams.delete('page'); 

                fetchNewData(url.toString());
            }

            // Memicu trigger saat select role diubah
            roleSelect.addEventListener('change', triggerUpdate);

            // Memicu trigger saat mengetik dengan jeda 500ms
            let timeout = null;
            searchInput.addEventListener('keyup', function() {
                if (this.value.length > 0) {
                    clearSearchBtn.classList.remove('hidden');
                } else {
                    clearSearchBtn.classList.add('hidden');
                }

                clearTimeout(timeout);
                timeout = setTimeout(triggerUpdate, 500); 
            });

            // Memicu trigger saat tombol silang (X) diklik
            if (clearSearchBtn) {
                clearSearchBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    this.classList.add('hidden');
                    triggerUpdate();
                    searchInput.focus();
                });
            }

            function attachPaginationListeners() {
                const paginationLinks = tableContainer.querySelectorAll('nav a');
                paginationLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault(); 
                        fetchNewData(this.href); 
                    });
                });
            }

            attachPaginationListeners();
        });
    </script>

@endsection