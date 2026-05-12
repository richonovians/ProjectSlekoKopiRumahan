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
                <option value="andalan sleko" {{ request('kategori') == 'andalan sleko' ? 'selected' : '' }}>Andalan Sleko</option>
                <option value="basis espresso" {{ request('kategori') == 'basis espresso' ? 'selected' : '' }}>Basis Espresso</option>
                <option value="bukan kopi" {{ request('kategori') == 'bukan kopi' ? 'selected' : '' }}>Bukan Kopi</option>
                <option value="kopi tubruk" {{ request('kategori') == 'kopi tubruk' ? 'selected' : '' }}>Kopi Tubruk</option>
                <option value="kudapan" {{ request('kategori') == 'kudapan' ? 'selected' : '' }}>Kudapan</option>
                <option value="seduh manual" {{ request('kategori') == 'seduh manual' ? 'selected' : '' }}>Seduh Manual</option>
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

    {{-- Pesan Notifikasi (Opsional, agar konsisten dengan halaman User) --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded shadow-sm">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

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

                                {{-- PERUBAHAN: Form diganti menjadi button trigger Modal --}}
                                <button type="button" onclick="openDeleteModal('{{ route('admin.menu.destroy', ['id' => $menu->id_menu]) }}', '{{ addslashes($menu->nama_menu) }}')" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-1.5 rounded-md transition" title="Hapus Menu">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
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

    {{-- TAMBAHAN: HTML Untuk Custom Pop-Up Modal (Di luar table-container) --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900/60 backdrop-blur-sm transition-opacity">
        <div id="deleteModalContent" class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 transform scale-95 opacity-0 transition-all duration-300 mx-4">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-3xl text-red-500"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Hapus Menu?</h3>
                <p class="text-sm text-gray-500 mb-6">Anda akan menghapus menu <span id="modalMenuName" class="font-bold text-gray-700"></span> secara permanen. Lanjutkan?</p>
                
                <div class="flex gap-3 w-full">
                    <button type="button" onclick="closeDeleteModal()" class="w-1/2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-xl transition">
                        Batal
                    </button>
                    {{-- Form ini URL-nya akan diisi otomatis oleh JavaScript --}}
                    <form id="deleteForm" method="POST" class="w-1/2 m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-xl shadow-sm transition">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // --- SCRIPT UNTUK MODAL HAPUS ---
        function openDeleteModal(url, name) {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('deleteModalContent');
            const form = document.getElementById('deleteForm');
            const nameSpan = document.getElementById('modalMenuName');

            // Masukkan URL dan Nama Menu secara dinamis
            form.action = url;
            nameSpan.textContent = name;

            // Tampilkan Modal dengan animasi
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('deleteModalContent');

            // Tutup Modal dengan animasi
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        // --- SCRIPT UNTUK AJAX PENCARIAN & FILTER ---
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const categorySelect = document.getElementById('category-select');
            const featuredSelect = document.getElementById('featured-select'); 
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
                const featured = featuredSelect.value; 
                
                const url = new URL(window.location.href);
                
                if (search) url.searchParams.set('search', search);
                else url.searchParams.delete('search');

                if (category) url.searchParams.set('kategori', category);
                else url.searchParams.delete('kategori');

                if (featured !== '') url.searchParams.set('is_featured', featured);
                else url.searchParams.delete('is_featured');

                url.searchParams.delete('page'); 

                fetchNewData(url.toString());
            }

            categorySelect.addEventListener('change', triggerUpdate);
            featuredSelect.addEventListener('change', triggerUpdate); 

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