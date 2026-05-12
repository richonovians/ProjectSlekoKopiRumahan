<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('admin.profile', [
            'user' => Auth::user() 
        ]);
    }

    /**
     * Memproses pembaruan Informasi Dasar profil.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name'    => ['required', 'string', 'max:50'],
            // Gunakan Auth::id() langsung untuk pengecualian email unik
            'email'   => ['required', 'string', 'email', 'max:30', 'unique:users,email,' . Auth::id()],
            'telepon' => ['nullable', 'string', 'max:15'],
        ], [
            'email.unique' => 'Email ini sudah digunakan oleh akun lain.',
        ]);

        // SOLUSI: Cari user secara eksplisit lewat Model agar tidak error "Undefined method"
        $user = User::find(Auth::id());
        $user->update($validatedData);

        return back()->with('success', 'Informasi profil berhasil diperbarui!');
    }

    /**
     * Memproses pembaruan Kata Sandi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.current_password' => 'Kata sandi saat ini yang Anda masukkan salah.',
            'password.confirmed'                => 'Konfirmasi kata sandi baru tidak cocok.',
            'password.min'                      => 'Kata sandi baru minimal harus 8 karakter.',
        ]);

        // SOLUSI: Terapkan cara yang sama untuk update password
        $user = User::find(Auth::id());
        $user->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        return back()->with('success', 'Kata sandi berhasil diperbarui!');
    }
}