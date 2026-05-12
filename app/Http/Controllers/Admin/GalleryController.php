<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <-- WAJIB ADA UNTUK MENGHAPUS FILE
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::with('user');

        // Pencarian Caption
        if ($request->filled('search')) {
            $query->where('nama_gambar', 'like', '%' . $request->search . '%');
        }

        // Filter Kategori (drink, food, interior)
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $galleries = $query->latest('id_galeri')->paginate(8);

        return view('admin.gallery', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'  => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'title'  => ['required', 'string', 'max:35'],
            'album'  => ['required', 'in:drink,food,interior'],
            'date'   => ['nullable', 'date'],
            'status' => ['required', 'in:aktif,draft'], // <-- 1. Tambahkan validasi status
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        $gallery = new Gallery();
        $gallery->id_user     = Auth::id();
        $gallery->nama_gambar = $validated['title'];
        $gallery->kategori    = $validated['album'];
        $gallery->status      = $validated['status'];
        $gallery->image_path  = $path;
        
        if ($request->filled('date')) {
            $gallery->created_at = $request->date . ' ' . now()->format('H:i:s');
        }
        
        $gallery->save();

        return redirect()->route('admin.gallery')->with('success', 'Foto berhasil diunggah!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'image'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'title'  => ['required', 'string', 'max:35'], 
            'album'  => ['required', 'in:drink,food,interior'],
            'date'   => ['nullable', 'date'], 
            'status' => ['required', 'in:aktif,draft'],
        ]);

        $gallery->nama_gambar = $validated['title'];
        $gallery->kategori    = $validated['album'];
        $gallery->status      = $validated['status'];

        // Update foto jika ada file baru
        if ($request->hasFile('image')) {
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $gallery->image_path = $request->file('image')->store('gallery', 'public');
        }

        // UPDATE TANGGAL: Mengubah created_at sesuai input manual
        if ($request->filled('date')) {
            // Kita pertahankan jam aslinya, hanya ubah tanggalnya saja
            $jamAsli = $gallery->created_at->format('H:i:s');
            $gallery->created_at = $request->date . ' ' . $jamAsli;
        }

        $gallery->save();

        return redirect()->route('admin.gallery')->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            // Hapus file dari folder public/storage
            Storage::disk('public')->delete($gallery->image_path);
        }

        // Baru setelah file fisiknya terhapus, data di tabel database dihapus
        $gallery->delete();

        return redirect()->route('admin.gallery')->with('success', 'Foto berhasil dihapus dari galeri!');
    }
}