<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // 1. Pencarian (berdasarkan nama atau email)
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // 2. Filter Peran (Role)
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // 3. Eksekusi query dengan paginasi 5 item per halaman
        $users = $query->latest()->paginate(5);

        return view('admin.users', compact('users'));
    }

    public function create()
    {
        // Pastikan nama file blade Anda adalah resources/views/admin/users/create.blade.php
        return view('admin.users.create'); 
    }
    
    public function store(Request $request)
    {
        // 1. Validasi Input sesuai batas karakter di tabel Database
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:30|unique:users',
            'telepon' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,superadmin',
        ], [
            // Kustomisasi pesan error agar ramah pengguna
            'email.unique' => 'Alamat email ini sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // 2. Simpan ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password), // Password wajib di-hash
            'role' => $request->role,
            // Jika checkbox diceklis maka bernilai 1, jika tidak maka 0
            'status' => $request->has('status') ? 1 : 0,
            'email_verified_at' => now(),
        ]);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->route('admin.users')->with('success', 'Akun admin berhasil didaftarkan!');
    }

    public function edit($id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);
        
        // Lempar data pengguna ke halaman view edit
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:50',
            // Pengecualian pada email, agar tidak error "Email sudah terdaftar" saat mengedit akun sendiri
            'email' => 'required|string|email|max:30|unique:users,email,' . $user->id, 
            'telepon' => 'nullable|string|max:15',
            'role' => 'required|in:admin,superadmin',
            // Password bersifat opsional saat proses edit
            'password' => 'nullable|string|min:8|confirmed', 
        ]);

        // Siapkan data yang akan diupdate
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'role' => $request->role,
            'status' => $request->has('status') ? 1 : 0,
        ];

        // Jika password diisi, enkripsi dan masukkan ke data update
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Eksekusi update
        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'Data admin berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->id == $user->id) {
            return redirect()->route('admin.users')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete(); // Karena SoftDeletes dicopot di Model, ini otomatis menjadi Hard Delete

        return redirect()->route('admin.users')->with('success', 'Akun admin berhasil dihapus permanen.');
    }
}
