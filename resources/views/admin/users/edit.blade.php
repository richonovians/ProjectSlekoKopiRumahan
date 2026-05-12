@extends('layouts.admin')

@section('title', 'Edit Admin')
@section('page_title', 'Edit Pengguna')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="border-b border-gray-100 px-6 py-4 bg-gray-50 flex justify-between items-center">
        <h3 class="font-bold text-gray-700">Form Edit Admin</h3>
        <a href="{{ route('admin.users') }}" class="text-sm text-gray-500 hover:text-coffee-primary transition">
            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="p-6">
        @csrf
        {{-- Wajib tambahkan @method('PUT') karena rute kita menggunakan metode PUT --}}
        @method('PUT') 

        <div class="space-y-5">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                {{-- Gunakan old('name', $user->name) agar saat pertama dibuka, berisi data asli. Jika error validasi, berisi ketikan terakhir --}}
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-1 focus:ring-coffee-primary focus:border-coffee-primary outline-none transition">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Alamat Email <span class="text-red-500">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-1 focus:ring-coffee-primary focus:border-coffee-primary outline-none transition">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-1.5">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}"
                    class="w-full px-4 py-2 border @error('telepon') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-1 focus:ring-coffee-primary focus:border-coffee-primary outline-none transition">
                @error('telepon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="role" class="block text-sm font-semibold text-gray-700 mb-1.5">Peran <span class="text-red-500">*</span></label>
                    <select id="role" name="role" required class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-coffee-primary focus:border-coffee-primary outline-none transition bg-white">
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    </select>
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Akun</label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="status" value="1" class="sr-only peer" {{ old('status', $user->status) == 1 ? 'checked' : '' }}>
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-coffee-primary/30 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                        <span class="ms-3 text-sm font-medium text-gray-600 peer-checked:text-green-600">Aktif</span>
                    </label>
                </div>
            </div>

            <hr class="border-gray-100 my-4">

            <div class="bg-blue-50/50 p-4 rounded-lg border border-blue-100">
                <h4 class="text-sm font-bold text-coffee-dark mb-3"><i class="fa-solid fa-lock mr-2"></i>Ubah Kata Sandi (Opsional)</h4>
                <p class="text-xs text-gray-500 mb-4">Kosongkan kolom ini jika Anda tidak ingin mengubah kata sandi.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Kata Sandi Baru</label>
                        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter"
                            class="w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-lg text-sm focus:ring-1 focus:ring-coffee-primary focus:border-coffee-primary outline-none transition">
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">Konfirmasi Sandi Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi sandi baru"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:ring-1 focus:ring-coffee-primary focus:border-coffee-primary outline-none transition">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.users') }}" class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-coffee-dark hover:bg-[#005bb5] rounded-lg shadow-sm transition flex items-center">
                    <i class="fa-solid fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection