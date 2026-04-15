<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        ]);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->route('admin.users')->with('success', 'Akun admin berhasil didaftarkan!');
    }
}
