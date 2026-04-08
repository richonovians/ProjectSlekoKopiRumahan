@extends('layouts.admin')

@section('title', 'Tambah Menu Baru')
@section('page_title', 'Tambah Menu')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.menu') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-coffee-dark transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Menu
        </a>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="flex flex-col lg:flex-row gap-6">
            
            <div class="lg:w-2/3 flex flex-col gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-coffee-dark mb-6 border-b border-gray-100 pb-4">Informasi Dasar</h2>
                    
                    <div class="mb-5">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Menu <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Contoh: Kopi Susu Aren" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                    </div>

                    <div class="mb-5">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Menu <span class="text-red-500">*</span></label>
                        <textarea id="description" name="description" rows="4" placeholder="Tuliskan deskripsi menarik tentang menu ini..." class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition resize-none" required></textarea>
                        <p class="text-[10px] text-gray-400 mt-1.5">Tulis deskripsi singkat dan jelas untuk menarik perhatian pelanggan.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select id="category" name="category" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-white" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="signature">Signature Drinks</option>
                                <option value="coffee">Coffee</option>
                                <option value="non-coffee">Non-Coffee</option>
                                <option value="pastry">Pastry & Bites</option>
                            </select>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Harga <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm font-medium">Rp</span>
                                </div>
                                <input type="number" id="price" name="price" placeholder="0" class="w-full border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/3 flex flex-col gap-6">
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Foto Produk</h2>
                    
                    <div class="w-full">
                        <div id="image-preview-container" class="border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 hover:bg-[#f5f7fd] hover:border-coffee-primary transition-colors cursor-pointer relative overflow-hidden group h-56 flex flex-col items-center justify-center text-center px-4" onclick="document.getElementById('image-upload').click()">
                            
                            <div id="upload-prompt" class="flex flex-col items-center">
                                <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3 text-coffee-primary group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Klik untuk upload foto</p>
                                <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG, WEBP (Max: 2MB)</p>
                            </div>

                            <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview">
                            
                            <div id="image-overlay" class="hidden absolute inset-0 bg-coffee-dark/60 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-xs font-bold uppercase tracking-wider bg-white/20 px-3 py-1.5 rounded-md"><i class="fa-solid fa-pen mr-2"></i>Ganti Foto</span>
                            </div>
                        </div>
                        
                        <input type="file" id="image-upload" name="image" class="hidden" accept="image/jpeg, image/png, image/webp" onchange="previewImage(event)">
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Pengaturan Publikasi</h2>
                    
                    <div class="mb-5">
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status Visibilitas</label>
                        <select id="status" name="status" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-white">
                            <option value="aktif">Aktif (Tampil di Website)</option>
                            <option value="draft">Draft (Sembunyikan Sementara)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ketersediaan Stok</label>
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="checkbox" name="is_available" class="w-4 h-4 text-coffee-primary bg-gray-100 border-gray-300 rounded focus:ring-coffee-primary focus:ring-2" checked>
                            <span class="ml-3 text-sm text-gray-700 font-medium">Menu ini tersedia (Ready)</span>
                        </label>
                    </div>
                </div>

                <div class="flex gap-3 mt-2">
                    <a href="{{ route('admin.menu') }}" class="w-1/3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-lg shadow-sm transition text-center text-sm">
                        Batal
                    </a>
                    <button type="submit" class="w-2/3 bg-coffee-dark hover:bg-[#005bb5] text-white font-semibold py-3 px-4 rounded-lg shadow-md transition text-center text-sm flex items-center justify-center">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Menu
                    </button>
                </div>

            </div>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Sembunyikan prompt ikon awan
                    document.getElementById('upload-prompt').classList.add('hidden');
                    
                    // Tampilkan gambar preview
                    const imgPreview = document.getElementById('image-preview');
                    imgPreview.src = e.target.result;
                    imgPreview.classList.remove('hidden');
                    
                    // Tampilkan overlay hover untuk ganti foto
                    document.getElementById('image-overlay').classList.remove('hidden');
                }
                
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection