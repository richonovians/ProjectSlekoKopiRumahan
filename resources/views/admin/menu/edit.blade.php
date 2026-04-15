@extends('layouts.admin')

@section('title', 'Edit Menu')
@section('page_title', 'Edit Menu')

@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <div class="mb-6">
        <a href="{{ route('admin.menu') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-coffee-dark transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Menu
        </a>
    </div>

    <form action="{{ route('admin.menu.update', ['id' => $menu->id_menu]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="flex flex-col lg:flex-row gap-6">
            
            <div class="lg:w-2/3 flex flex-col gap-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-coffee-dark mb-6 border-b border-gray-100 pb-4">Informasi Dasar</h2>
                    
                    <div class="mb-5">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Menu <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" placeholder="Contoh: Kopi Susu Aren" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
                    </div>

                    <div class="mb-5">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Menu <span class="text-red-500">*</span></label>
                        <textarea id="description" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi menarik tentang menu ini..." class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition resize-none" required>{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        <p class="text-[10px] text-gray-400 mt-1.5">Tulis deskripsi singkat dan jelas untuk menarik perhatian pelanggan.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select id="category" name="jenis" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-white" required>
                                <option value="" disabled>Pilih Kategori</option>
                                <option value="minuman" {{ old('jenis', $menu->jenis) == 'minuman' ? 'selected' : '' }}>Minuman</option>
                                <option value="makanan" {{ old('jenis', $menu->jenis) == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            </select>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Harga <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm font-medium">Rp</span>
                                </div>
                                <input type="number" id="price" name="harga" value="{{ old('harga', $menu->harga) }}" placeholder="0" class="w-full border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition" required>
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
                            
                            <div id="upload-prompt" class="flex flex-col items-center {{ $menu->gambar ? 'hidden' : '' }}">
                                <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3 text-coffee-primary group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Klik untuk ganti foto</p>
                                <p class="text-[10px] text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto</p>
                            </div>

                            <img id="image-preview" src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : '' }}" class="absolute inset-0 w-full h-full object-cover {{ $menu->gambar ? '' : 'hidden' }}" alt="Preview">
                            
                            <div id="image-overlay" class="absolute inset-0 bg-coffee-dark/60 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 {{ $menu->gambar ? '' : 'hidden' }}">
                                <span class="text-white text-xs font-bold uppercase tracking-wider bg-white/20 px-3 py-1.5 rounded-md"><i class="fa-solid fa-pen mr-2"></i>Ganti Foto</span>
                            </div>
                        </div>
                        
                        <input type="file" id="image-upload" name="gambar" class="hidden" accept="image/jpeg, image/png, image/webp" onchange="initCrop(event)">
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-coffee-dark mb-4 border-b border-gray-100 pb-4">Pengaturan Publikasi</h2>
                    
                    <div class="mb-5">
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status Visibilitas</label>
                        <select id="status" name="status" class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-coffee-primary/20 focus:border-coffee-primary outline-none transition bg-white">
                            <option value="aktif" {{ old('status', $menu->status) == 'aktif' ? 'selected' : '' }}>Aktif (Tampil di Website)</option>
                            <option value="draft" {{ old('status', $menu->status) == 'draft' ? 'selected' : '' }}>Draft (Sembunyikan Sementara)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Menu Unggulan</label>
                        <label class="flex items-center p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $menu->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-coffee-primary bg-gray-100 border-gray-300 rounded focus:ring-coffee-primary focus:ring-2">
                            <span class="ml-3 text-sm text-gray-700 font-medium">Jadikan Menu Unggulan (Featured)</span>
                        </label>
                    </div>
                </div>

                <div class="flex gap-3 mt-2">
                    <a href="{{ route('admin.menu') }}" class="w-1/3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-lg shadow-sm transition text-center text-sm">
                        Batal
                    </a>
                    <button type="submit" class="w-2/3 bg-coffee-dark hover:bg-[#005bb5] text-white font-semibold py-3 px-4 rounded-lg shadow-md transition text-center text-sm flex items-center justify-center">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Update Menu
                    </button>
                </div>

            </div>
        </div>
    </form>

    <div id="crop-modal" class="fixed inset-0 z-50 hidden bg-black/80 flex items-center justify-center p-4 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden transform scale-95 transition-transform duration-300" id="crop-modal-content">
            
            <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-coffee-dark"><i class="fa-solid fa-crop-simple mr-2"></i> Sesuaikan Gambar</h3>
                <button type="button" onclick="closeCropModal(true)" class="text-gray-400 hover:text-red-500 transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-6">
                <div class="w-full h-[400px] bg-gray-200 rounded-lg overflow-hidden relative">
                    <img id="image-to-crop" src="" class="max-w-full block">
                </div>

                <div class="flex justify-between items-center mt-6">
                    <div class="flex space-x-2">
                        <button type="button" onclick="cropper.zoom(0.1)" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition" title="Zoom In">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </button>
                        <button type="button" onclick="cropper.zoom(-0.1)" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition" title="Zoom Out">
                            <i class="fa-solid fa-magnifying-glass-minus"></i>
                        </button>
                        <button type="button" onclick="cropper.reset()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition" title="Reset">
                            <i class="fa-solid fa-rotate-left"></i>
                        </button>
                    </div>

                    <div class="flex space-x-3">
                        <button type="button" onclick="closeCropModal(true)" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="button" onclick="applyCrop()" class="px-5 py-2 bg-coffee-primary hover:bg-coffee-dark text-white rounded-lg text-sm font-bold shadow-md transition flex items-center">
                            <i class="fa-solid fa-check mr-2"></i> Terapkan & Simpan
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        let cropper = null;
        const imageUpload = document.getElementById('image-upload');
        const imageToCrop = document.getElementById('image-to-crop');
        const cropModal = document.getElementById('crop-modal');
        const cropModalContent = document.getElementById('crop-modal-content');
        const imgPreview = document.getElementById('image-preview');

        // PERBAIKAN: Menyimpan hasil crop terakhir di memori agar tidak hilang saat di-Batal
        let lastCroppedFile = null;
        let lastCroppedUrl = null;

        // Otomatis mengecek foto dari database (Kosong di halaman Tambah, Terisi di halaman Edit)
        const oldImageSrc = "{{ isset($menu) && $menu->gambar ? asset('storage/' . $menu->gambar) : '' }}";

        function initCrop(event) {
            const files = event.target.files;
            
            if (files && files.length > 0) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imageToCrop.src = e.target.result;
                    
                    cropModal.classList.remove('hidden');
                    setTimeout(() => {
                        cropModal.classList.remove('opacity-0');
                        cropModalContent.classList.remove('scale-95');
                    }, 10);

                    if (cropper) {
                        cropper.destroy();
                    }

                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1, 
                        viewMode: 2, 
                        dragMode: 'move', 
                        autoCropArea: 0.9,
                        restore: false,
                        guides: true,
                        center: true,
                        highlight: false,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        toggleDragModeOnDblclick: false,
                    });
                };
                
                reader.readAsDataURL(files[0]);
            }
        }

        function closeCropModal(isCancel = false) {
            cropModal.classList.add('opacity-0');
            cropModalContent.classList.add('scale-95');
            
            setTimeout(() => {
                cropModal.classList.add('hidden');
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                
                // LOGIKA PEMBATALAN YANG DIPERBAIKI
                if (isCancel) {
                    if (lastCroppedFile) {
                        // 1. Jika sebelumnya SUDAH PERNAH berhasil crop foto baru, kembalikan ke foto baru tersebut
                        const container = new DataTransfer();
                        container.items.add(lastCroppedFile);
                        imageUpload.files = container.files;

                        imgPreview.src = lastCroppedUrl;
                        imgPreview.classList.remove('hidden');
                        document.getElementById('upload-prompt').classList.add('hidden');
                        document.getElementById('image-overlay').classList.remove('hidden');

                    } else if (oldImageSrc !== '') {
                        // 2. Jika belum pernah crop, tapi ADA foto dari database (Halaman Edit Menu)
                        imageUpload.value = '';
                        imgPreview.src = oldImageSrc;
                        imgPreview.classList.remove('hidden');
                        document.getElementById('upload-prompt').classList.add('hidden');
                        document.getElementById('image-overlay').classList.remove('hidden');

                    } else {
                        // 3. Jika belum pernah crop dan TIDAK ADA foto lama (Halaman Tambah Menu awal)
                        imageUpload.value = '';
                        imgPreview.classList.add('hidden');
                        document.getElementById('upload-prompt').classList.remove('hidden');
                        document.getElementById('image-overlay').classList.add('hidden');
                    }
                }
                
            }, 300);
        }

        function applyCrop() {
            if (!cropper) return;

            const canvas = cropper.getCroppedCanvas({
                width: 800, 
                height: 800, 
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });

            canvas.toBlob(function(blob) {
                
                // Bebaskan URL memory lama jika ada, untuk mencegah browser lag (Memory Leak)
                if (lastCroppedUrl) URL.revokeObjectURL(lastCroppedUrl);

                // Simpan hasil ke "Memori Ingatan"
                lastCroppedUrl = URL.createObjectURL(blob);
                lastCroppedFile = new File([blob], "cropped_menu.jpg", { type: "image/jpeg", lastModified: new Date().getTime() });
                
                // Tampilkan ke UI Preview
                imgPreview.src = lastCroppedUrl;
                imgPreview.classList.remove('hidden');
                document.getElementById('upload-prompt').classList.add('hidden');
                document.getElementById('image-overlay').classList.remove('hidden');

                // Masukkan secara rahasia ke input file
                const container = new DataTransfer();
                container.items.add(lastCroppedFile);
                imageUpload.files = container.files; 

                // Tutup modal
                closeCropModal(false);
                
            }, 'image/jpeg', 0.85); 
        }
    </script>

@endsection