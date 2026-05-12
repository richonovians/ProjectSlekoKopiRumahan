@extends('layouts.admin')

@section('title', 'Kelola Gallery')
@section('page_title', 'Manajemen Galeri Foto')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        
        {{-- Form Filter & Pencarian (Dimodifikasi untuk AJAX) --}}
        <form id="filter-form" action="{{ route('admin.gallery') }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full md:w-auto" onsubmit="event.preventDefault();">
            <div class="relative flex items-center">
                <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-sm"></i>
                <input type="text" id="search-input" name="search" value="{{ request('search') }}" placeholder="Cari foto/caption..." class="pl-10 pr-10 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition shadow-sm" autocomplete="off">
                
                {{-- Tombol Clear Search --}}
                <button type="button" id="clear-search" class="absolute right-3 text-gray-400 hover:text-red-500 transition {{ request('search') ? '' : 'hidden' }}" title="Hapus pencarian">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
            
            <select id="kategori-select" name="kategori" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer w-full sm:w-auto shadow-sm">
                <option value="">Semua Album</option>
                <option value="interior" {{ request('kategori') == 'interior' ? 'selected' : '' }}>Interior Cafe</option>
                <option value="drink" {{ request('kategori') == 'drink' ? 'selected' : '' }}>Minuman (Drink)</option>
                <option value="food" {{ request('kategori') == 'food' ? 'selected' : '' }}>Makanan (Food)</option>
            </select>
        </form>

        <a href="{{ route('admin.gallery.create') }}" class="w-full md:w-auto bg-coffee-dark hover:bg-[#005bb5] text-white px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-md flex items-center justify-center group">
            <i class="fa-solid fa-cloud-arrow-up mr-2 group-hover:-translate-y-1 transition-transform"></i> Upload Foto
        </a>
    </div>

    {{-- Pesan Notifikasi --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded shadow-sm">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Area yang akan di-update oleh AJAX --}}
    <div id="gallery-container" class="w-full transition-opacity duration-300">
        
        @forelse($galleries->groupBy('kategori') as $kategori => $fotos)
            
            <div class="mb-10 w-full">
                <div class="flex items-center mb-5 border-b border-gray-200 pb-2">
                    <h2 class="text-xl font-bold text-coffee-dark uppercase tracking-wider">
                        @if($kategori == 'interior') Interior Cafe
                        @elseif($kategori == 'drink') Minuman (Drink)
                        @elseif($kategori == 'food') Makanan (Food)
                        @else {{ $kategori }}
                        @endif
                    </h2>
                    <span class="ml-3 px-2.5 py-1 bg-gray-100 text-gray-500 text-[10px] font-bold rounded-full border border-gray-200">{{ $fotos->count() }} Foto</span>
                </div>

                {{-- Penyesuaian Grid: Menggunakan slider horizontal di layar ekstra kecil (mobile) --}}
                <div class="flex overflow-x-auto sm:grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 pb-4 sm:pb-0 snap-x">
                    
                    @foreach($fotos as $foto)
                    {{-- Di mobile, lebar kartu di-set tetap (min-w-[80vw]) agar bisa di-scroll menyamping (swipe). Di tablet/desktop kembali ke grid normal --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group flex flex-col min-w-[80vw] sm:min-w-0 snap-center">
                        
                        <div class="relative h-48 sm:h-56 overflow-hidden bg-gray-100">
                            <img src="{{ asset('storage/' . $foto->image_path) }}" alt="{{ $foto->nama_gambar }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            {{-- BADGE KATEGORI --}}
                            <span class="absolute top-3 left-3 bg-black/60 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-3 rounded-md shadow-sm">
                                {{ ucfirst($foto->kategori) }}
                            </span>

                            {{-- BADGE STATUS --}}
                            @if($foto->status == 'aktif')
                                <span class="absolute top-3 right-3 bg-green-500/90 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-2.5 rounded-md shadow-sm flex items-center">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full mr-1.5 animate-pulse"></span> Aktif
                                </span>
                            @else
                                <span class="absolute top-3 right-3 bg-gray-600/90 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider py-1 px-2.5 rounded-md shadow-sm flex items-center">
                                    <i class="fa-solid fa-lock mr-1.5"></i> Draft
                                </span>
                            @endif

                            {{-- OVERLAY DESKTOP: Hanya tampil di layar md (tablet) ke atas --}}
                            <div class="hidden md:flex absolute inset-0 bg-[#023A73]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 items-center justify-center gap-4 backdrop-blur-[2px]">
                                <a href="{{ route('admin.gallery.edit', $foto->id_galeri) }}" class="bg-white text-blue-600 w-10 h-10 rounded-full hover:bg-blue-50 transition transform hover:scale-110 hover:shadow-lg flex items-center justify-center" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                
                                <button type="button" onclick="openDeleteModal('{{ route('admin.gallery.destroy', $foto->id_galeri) }}', '{{ addslashes($foto->nama_gambar) }}')" class="bg-white text-red-600 w-10 h-10 rounded-full hover:bg-red-50 transition transform hover:scale-110 hover:shadow-lg flex items-center justify-center" title="Hapus Foto">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <h3 class="font-bold text-coffee-dark text-sm truncate mb-1" title="{{ $foto->nama_gambar }}">{{ $foto->nama_gambar }}</h3>
                            
                            {{-- Info Meta --}}
                            <div class="flex justify-between items-center mt-2 text-[10px] text-gray-400">
                                <span class="flex items-center"><i class="fa-regular fa-clock mr-1.5"></i> {{ $foto->created_at->format('d M Y') }}</span>
                                <span class="flex items-center"><i class="fa-solid fa-user mr-1.5"></i> {{ $foto->user->name ?? 'Admin' }}</span>
                            </div>

                            {{-- TOMBOL AKSI MOBILE: Hanya tampil di layar di bawah md --}}
                            <div class="flex md:hidden justify-between gap-2 mt-4 pt-4 border-t border-gray-100">
                                <a href="{{ route('admin.gallery.edit', $foto->id_galeri) }}" class="flex-1 bg-blue-50 text-blue-600 hover:bg-blue-100 py-2 rounded-lg text-xs font-bold text-center transition flex items-center justify-center">
                                    <i class="fa-solid fa-pen mr-1.5"></i> Edit
                                </a>
                                <button type="button" onclick="openDeleteModal('{{ route('admin.gallery.destroy', $foto->id_galeri) }}', '{{ addslashes($foto->nama_gambar) }}')" class="flex-1 bg-red-50 text-red-600 hover:bg-red-100 py-2 rounded-lg text-xs font-bold text-center transition flex items-center justify-center">
                                    <i class="fa-solid fa-trash-can mr-1.5"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        @empty
            <div class="w-full py-16 text-center bg-white rounded-xl border border-gray-200 border-dashed">
                <div class="flex flex-col items-center justify-center text-gray-400">
                    <i class="fa-solid fa-images text-5xl mb-4 opacity-30"></i>
                    <p class="text-sm font-medium">Belum ada foto di galeri.</p>
                </div>
            </div>
        @endforelse

        {{-- Paginasi --}}
        <div class="mt-4 flex justify-center pb-8">
            {{ $galleries->appends(request()->query())->links() }}
        </div>

    </div>

    {{-- CUSTOM MODAL UNTUK HAPUS FOTO --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900/60 backdrop-blur-sm transition-opacity">
        <div id="deleteModalContent" class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 transform scale-95 opacity-0 transition-all duration-300 mx-4 border-t-4 border-red-500">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-3xl text-red-600"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Hapus Foto Galeri?</h3>
                <p class="text-sm text-gray-500 mb-6">Anda akan menghapus foto <span id="modalFotoName" class="font-bold text-gray-800"></span>. File asli juga akan dihapus dari server. <br><span class="text-red-500 font-semibold mt-1 block">Tindakan ini tidak bisa dibatalkan!</span></p>
                
                <div class="flex gap-3 w-full">
                    <button type="button" onclick="closeDeleteModal()" class="w-1/2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-xl transition">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="w-1/2 m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-xl shadow-sm transition">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS UNTUK AJAX DAN MODAL --}}
    <script>
        // --- LOGIKA MODAL HAPUS ---
        function openDeleteModal(url, name) {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('deleteModalContent');
            const form = document.getElementById('deleteForm');
            const nameSpan = document.getElementById('modalFotoName');

            form.action = url;
            nameSpan.textContent = name;

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

            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }

        // --- LOGIKA AJAX REALTIME FILTER ---
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const kategoriSelect = document.getElementById('kategori-select');
            const galleryContainer = document.getElementById('gallery-container');
            const clearSearchBtn = document.getElementById('clear-search');

            async function fetchNewData(url) {
                try {
                    galleryContainer.classList.add('opacity-50', 'pointer-events-none');

                    const response = await fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    const html = await response.text();

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    const newContent = doc.getElementById('gallery-container').innerHTML;
                    galleryContainer.innerHTML = newContent;

                    galleryContainer.classList.remove('opacity-50', 'pointer-events-none');
                    window.history.pushState({}, '', url);

                    attachPaginationListeners();
                } catch (error) {
                    console.error('Gagal mengambil data:', error);
                    galleryContainer.classList.remove('opacity-50', 'pointer-events-none');
                }
            }

            function triggerUpdate() {
                const search = searchInput.value;
                const kategori = kategoriSelect.value;
                
                const url = new URL(window.location.href);
                
                if (search) url.searchParams.set('search', search);
                else url.searchParams.delete('search');

                if (kategori) url.searchParams.set('kategori', kategori);
                else url.searchParams.delete('kategori');

                url.searchParams.delete('page'); 

                fetchNewData(url.toString());
            }

            kategoriSelect.addEventListener('change', triggerUpdate);

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
                const paginationLinks = galleryContainer.querySelectorAll('nav a');
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