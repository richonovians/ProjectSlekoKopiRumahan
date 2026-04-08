@extends('layouts.admin')

@section('title', 'Upload Foto Galeri')
@section('page_title', 'Upload Foto Baru')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.gallery') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-coffee-dark transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Galeri
        </a>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="flex flex-col lg:flex-row gap-6">
            
            <div class="lg:w-2/3 flex flex-col gap-6">
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-4">
                        <h2 class="text-lg font-bold text-coffee-dark">File Foto</h2>
                        <span class="text-[10px] bg-blue-50 text-blue-600 font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Maksimal 2MB</span>
                    </div>
                    
                    <div class="w-full mt-2">
                        <div id="image-preview-container" class="border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 hover:bg-[#f5f7fd] hover:border-coffee-primary transition-colors cursor-pointer relative overflow-hidden group h-80 flex flex-col items-center justify-center text-center px-4" onclick="document.getElementById('image-upload').click()">
                            
                            <div id="upload-prompt" class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-white rounded-full shadow-sm flex items-center justify-center mb-4 text-coffee-primary group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-image text-2xl"></i>
                                </div>
                                <p class="text-base font-semibold text-gray-700">Pilih atau letakkan foto di sini</p>
                                <p class="text-xs text-gray-400 mt-1">Format yang didukung: JPG, JPEG, PNG, WEBP</p>
                                <p class="text-[10px] text-gray-400 mt-4">Rekomendasi ukuran: Landscape atau Persegi (1:1)</p>
                            </div>

                            <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview Galeri">
                            
                            <div id="image-overlay" class="hidden absolute inset-0 bg-coffee-dark/60 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-sm font-bold uppercase tracking-wider bg-white/20 px-4 py-2 rounded-md"><i class="fa-solid fa-camera-rotate mr-2"></i>Pilih Foto Lain</span>
                            </div>
                        </div>
                        
                        <input type="file" id="image-upload" name="image" class="hidden" accept="image/jpeg, image/png, image/webp" onchange="previewImage(event)" required>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Detail Caption</h2>
                    
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Caption Foto <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" placeholder="Contoh: Suasana sore yang nyaman di sudut cafe..." class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                        <p class="text-[10px] text-gray-400 mt-1.5">Caption ini akan ditampilkan di bawah foto saat pengunjung melihat galeri.</p>
                    </div>
                </div>

            </div>

            <div class="lg:w-1/3 flex flex-col gap-6">
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Pengaturan Album</h2>
                    
                    <div class="mb-4">
                        <label for="album" class="block text-sm font-semibold text-gray-700 mb-2">Kategori Album <span class="text-red-500">*</span></label>
                        <select id="album" name="album" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-white" required>
                            <option value="" disabled selected>-- Pilih Album --</option>
                            <option value="ambience">Ambience Cafe</option>
                            <option value="produk">Produk & Menu</option>
                            <option value="event">Event & Promo</option>
                        </select>
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Publikasi</label>
                        <input type="date" id="date" name="date" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition text-gray-600">
                        <p class="text-[10px] text-gray-400 mt-1.5">Kosongkan jika ingin menggunakan tanggal hari ini.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Visibilitas</h2>
                    
                    <label class="relative flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition group mb-3">
                        <input type="radio" name="status" value="aktif" class="w-4 h-4 text-coffee-primary border-gray-300 focus:ring-coffee-primary" checked>
                        <div class="ml-3 flex flex-col">
                            <span class="text-sm font-bold text-gray-800">Publikasikan</span>
                            <span class="text-[10px] text-gray-500 font-normal">Foto langsung tampil di website.</span>
                        </div>
                    </label>

                    <label class="relative flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition group">
                        <input type="radio" name="status" value="draft" class="w-4 h-4 text-gray-400 border-gray-300 focus:ring-gray-400">
                        <div class="ml-3 flex flex-col">
                            <span class="text-sm font-bold text-gray-600">Simpan sebagai Draft</span>
                            <span class="text-[10px] text-gray-500 font-normal">Foto hanya terlihat oleh admin.</span>
                        </div>
                    </label>
                </div>

                <div class="flex gap-3 mt-2">
                    <a href="{{ route('admin.gallery') }}" class="w-1/3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-lg shadow-sm transition text-center text-sm">
                        Batal
                    </a>
                    <button type="submit" class="w-2/3 bg-coffee-dark hover:bg-[#005bb5] text-white font-semibold py-3 px-4 rounded-lg shadow-md transition text-center text-sm flex items-center justify-center">
                        <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Upload Foto
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
                    // Sembunyikan instruksi drag & drop
                    document.getElementById('upload-prompt').classList.add('hidden');
                    
                    // Tampilkan gambar preview
                    const imgPreview = document.getElementById('image-preview');
                    imgPreview.src = e.target.result;
                    imgPreview.classList.remove('hidden');
                    
                    // Aktifkan overlay hover
                    document.getElementById('image-overlay').classList.remove('hidden');
                }
                
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection