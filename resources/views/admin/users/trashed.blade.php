@extends('layouts.admin')

@section('title', 'Arsip Admin')
@section('page_title', 'Arsip Pengguna Terhapus')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        {{-- Pencarian & Filter (DIMODIFIKASI UNTUK AJAX) --}}
        <form id="filter-form" action="{{ route('admin.users.trashed') }}" method="GET" class="flex flex-col sm:flex-row gap-3 w-full md:w-auto" onsubmit="event.preventDefault();">
            <div class="relative flex items-center">
                <i class="fa-solid fa-magnifying-glass absolute left-3 text-gray-400 text-sm"></i>
                <input type="text" id="search-input" name="search" value="{{ request('search') }}" placeholder="Cari di arsip..." 
                    class="pl-10 pr-10 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary w-full sm:w-64 transition shadow-sm" autocomplete="off">
                
                {{-- Tombol Silang (Clear Search) --}}
                <button type="button" id="clear-search" class="absolute right-3 text-gray-400 hover:text-red-500 transition {{ request('search') ? '' : 'hidden' }}" title="Hapus pencarian">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
            
            <select id="role-select" name="role" class="px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-coffee-primary focus:ring-1 focus:ring-coffee-primary text-gray-600 bg-white cursor-pointer shadow-sm">
                <option value="">Semua Peran</option>
                <option value="superadmin" {{ request('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </form>

        {{-- Navigasi Kembali --}}
        <a href="{{ route('admin.users') }}" class="w-full md:w-auto bg-gray-100 hover:bg-gray-200 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-semibold transition shadow-sm flex items-center justify-center border border-gray-200">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Aktif
        </a>
    </div>

    {{-- Pesan Notifikasi --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm rounded shadow-sm">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded shadow-sm">
            <i class="fa-solid fa-triangle-exclamation mr-2"></i> {{ session('error') }}
        </div>
    @endif

    {{-- Tambahan transisi pada table-container --}}
    <div id="table-container" class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-opacity duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold w-12 text-center">No</th>
                        <th class="px-6 py-4 font-semibold">Pengguna</th>
                        <th class="px-6 py-4 font-semibold text-center">Peran</th>
                        <th class="px-6 py-4 font-semibold">Dihapus Pada</th>
                        <th class="px-6 py-4 font-semibold text-center text-red-500">Aksi Permanen</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    @forelse($users as $user)
                    <tr class="hover:bg-red-50/30 transition group">
                        <td class="px-6 py-4 text-gray-500 text-center">
                            {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                        </td>
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=E5E7EB&color=9CA3AF" alt="{{ $user->name }}" class="w-10 h-10 rounded-full object-cover shadow-sm border border-gray-200 grayscale">
                                <div class="ml-3">
                                    <p class="font-bold text-gray-500">{{ $user->name }}</p>
                                    <p class="text-[10px] text-gray-400 mt-0.5">{{ $user->email }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-400 border border-gray-200 uppercase tracking-wider">
                                {{ $user->role }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-500 font-medium">{{ $user->deleted_at->format('d M Y') }}</p>
                            <p class="text-[10px] text-gray-400 italic">Oleh sistem (Soft Delete)</p>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-3">
                                
                                {{-- Tombol Restore --}}
                                <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-green-600 hover:text-green-700 hover:bg-green-100 p-2 rounded-lg transition border border-transparent hover:border-green-200" title="Kembalikan Akun">
                                        <i class="fa-solid fa-rotate-left"></i> <span class="ml-1 text-[10px] font-bold uppercase">Restore</span>
                                    </button>
                                </form>

                                {{-- Tombol Force Delete (Menggunakan Modal) --}}
                                <button type="button" onclick="openForceDeleteModal('{{ route('admin.users.force_delete', $user->id) }}', '{{ addslashes($user->name) }}')" class="text-red-500 hover:text-red-700 hover:bg-red-100 p-2 rounded-lg transition border border-transparent hover:border-red-200" title="Hapus Permanen">
                                    <i class="fa-solid fa-eraser"></i> <span class="ml-1 text-[10px] font-bold uppercase">Hapus</span>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-12">
                            <div class="flex flex-col items-center justify-center text-gray-400">
                                <i class="fa-solid fa-box-archive text-4xl mb-3 opacity-20"></i>
                                <p class="text-sm">Tidak ada data di dalam arsip tong sampah.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-gray-50 border-t border-gray-100 px-6 py-4">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>

    {{-- MODAL HTML UNTUK FORCE DELETE --}}
    <div id="forceDeleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900/70 backdrop-blur-sm transition-opacity">
        <div id="forceDeleteModalContent" class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 transform scale-95 opacity-0 transition-all duration-300 mx-4 border-t-4 border-red-600">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-3xl text-red-600"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Hapus Selamanya?</h3>
                <p class="text-sm text-gray-500 mb-6">Anda akan memusnahkan akun <span id="modalForceUserName" class="font-bold text-gray-800"></span> dari database. Data terkait mungkin akan terpengaruh. <br><span class="text-red-500 font-semibold mt-1 block">Tindakan ini tidak bisa dibatalkan!</span></p>
                
                <div class="flex gap-3 w-full">
                    <button type="button" onclick="closeForceDeleteModal()" class="w-1/2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-xl transition">
                        Batal
                    </button>
                    {{-- Form eksekutor Force Delete --}}
                    <form id="forceDeleteForm" method="POST" class="w-1/2 m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-xl shadow-sm transition">
                            Ya, Musnahkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- JAVASCRIPT UNTUK KONTROL MODAL & AJAX FILTER --}}
    <script>
        // --- SCRIPT UNTUK MODAL HAPUS ---
        function openForceDeleteModal(url, name) {
            const modal = document.getElementById('forceDeleteModal');
            const modalContent = document.getElementById('forceDeleteModalContent');
            const form = document.getElementById('forceDeleteForm');
            const nameSpan = document.getElementById('modalForceUserName');

            form.action = url;
            nameSpan.textContent = name;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeForceDeleteModal() {
            const modal = document.getElementById('forceDeleteModal');
            const modalContent = document.getElementById('forceDeleteModalContent');

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
            const roleSelect = document.getElementById('role-select');
            const tableContainer = document.getElementById('table-container');
            const clearSearchBtn = document.getElementById('clear-search');

            async function fetchNewData(url) {
                try {
                    // Beri efek transparan saat loading
                    tableContainer.classList.add('opacity-50', 'pointer-events-none');

                    const response = await fetch(url, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    const html = await response.text();

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // Ganti isi tabel
                    const newTableContent = doc.getElementById('table-container').innerHTML;
                    tableContainer.innerHTML = newTableContent;

                    // Kembalikan efek tabel
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

                url.searchParams.delete('page'); // Reset ke halaman 1

                fetchNewData(url.toString());
            }

            // Pemicu saat Select Role diganti
            roleSelect.addEventListener('change', triggerUpdate);

            // Pemicu saat mengetik (dengan jeda 500ms)
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

            // Pemicu tombol silang hapus pencarian
            if (clearSearchBtn) {
                clearSearchBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    this.classList.add('hidden');
                    triggerUpdate();
                    searchInput.focus();
                });
            }

            // Pemicu navigasi Paginasi secara AJAX
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