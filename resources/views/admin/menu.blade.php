@extends('layouts.admin')

@section('title', 'Kelola Menu')
@section('page_title', 'Manajemen Menu')

@section('content')
    
    <div class="flex flex-col lg:flex-row justify-between items-center mb-6 gap-4">
        
        <form id="filter-form" action="{{ route('admin.menu') }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto" onsubmit="event.preventDefault();">
            
            <div class="relative flex items-center">
                <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-sm"></i>
                
                <input type="text" id="search-input" name="search" value="{{ request('search') }}" placeholder="Cari nama menu..." class="pl-10 pr-10 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition" autocomplete="off">
                
                <button type="button" id="clear-search" class="absolute right-3 text-gray-400 hover:text-red-500 transition {{ request('search') ? '' : 'hidden' }}" title="Hapus pencarian">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
            
            <select id="category-select" name="kategori" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto">
                <option value="">Semua Kategori</option>
                <option value="minuman" {{ request('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="makanan" {{ request('kategori') == 'makanan' ? 'selected' : '' }}>Makanan</option>
            </select>

            <select id="featured-select" name="is_featured" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto">
                <option value="">Semua Status</option>
                <option value="1" {{ request('is_featured') == '1' ? 'selected' : '' }}>⭐ Menu Unggulan</option>
                <option value="0" {{ request('is_featured') == '0' ? 'selected' : '' }}>Menu Biasa</option>
            </select>
        </form>

        <a href="{{ route('admin.menu.create') }}" class="w-full lg:w-auto bg-coffee-dark hover:bg-[#005bb5] text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm flex items-center justify-center">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Menu
        </a>
    </div>

    <div id="table-container" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-opacity duration-300">
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
                    @forelse($menus as $menu)
                    <tr class="hover:bg-gray-50 transition group">
                        <td class="px-6 py-4 text-gray-500">#{{ $loop->iteration + ($menus->currentPage() - 1) * $menus->perPage() }}</td>

                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="{{ asset('storage/' . $menu->gambar) }}" class="w-12 h-12 rounded-lg object-cover shadow-sm border border-gray-100">
                                <div class="ml-4">
                                    <div class="flex items-center gap-2">
                                        <p class="font-bold text-coffee-dark">{{ $menu->nama_menu }}</p>
                                        
                                        @if($menu->is_featured)
                                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-bold bg-yellow-100 text-yellow-700 uppercase tracking-wider" title="Menu ini tampil di Beranda">
                                                <i class="fa-solid fa-star mr-1 text-[8px]"></i> Unggulan
                                            </span>
                                        @endif

                                    </div>
                                    <p class="text-[10px] text-gray-400 mt-0.5 line-clamp-1 w-48">
                                        {{ $menu->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-600">
                                {{ ucfirst($menu->jenis) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-800">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($menu->status == 'aktif')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase tracking-widest">Aktif</span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-gray-200 text-gray-600 uppercase tracking-widest">Draft</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-3 opacity-70 group-hover:opacity-100 transition">
                                <a href="{{ route('admin.menu.edit', ['id' => $menu->id_menu]) }}" class="text-blue-500 hover:text-blue-700 hover:bg-blue-50 p-1.5 rounded-md transition" title="Edit Menu">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                <form action="{{ route('admin.menu.destroy', ['id' => $menu->id_menu]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-md transition" title="Hapus Menu">
                                        <i class="fa-solid fa-trash-can text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            Data menu belum ada atau tidak ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white border-t border-gray-100 px-6 py-4">
            {{ $menus->appends(request()->query())->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const categorySelect = document.getElementById('category-select');
            const featuredSelect = document.getElementById('featured-select'); // <-- Variabel baru
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
                const category = categorySelect.value;
                const featured = featuredSelect.value; // <-- Ambil nilai filter unggulan
                
                const url = new URL(window.location.href);
                
                if (search) url.searchParams.set('search', search);
                else url.searchParams.delete('search');

                if (category) url.searchParams.set('kategori', category);
                else url.searchParams.delete('kategori');

                // Logika Filter Unggulan
                if (featured !== '') url.searchParams.set('is_featured', featured);
                else url.searchParams.delete('is_featured');

                url.searchParams.delete('page'); 

                fetchNewData(url.toString());
            }

            // Event listener untuk memicu pencarian otomatis saat dipilih
            categorySelect.addEventListener('change', triggerUpdate);
            featuredSelect.addEventListener('change', triggerUpdate); // <-- Trigger baru

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