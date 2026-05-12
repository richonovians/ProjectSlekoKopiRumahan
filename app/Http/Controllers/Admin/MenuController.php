<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::query();

        // 1. Pencarian
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_menu', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        // 2. Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('jenis', $request->kategori);
        }

        // 3. Filter Menu Unggulan (TAMBAHAN BARU)
        if ($request->has('is_featured') && $request->is_featured !== null) {
            $query->where('is_featured', $request->is_featured);
        }

        $menus = $query->latest()->paginate(10);

        return view('admin.menu', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required|in:kopi tubruk,andalan sleko,basis espresso,seduh manual,bukan kopi,kudapan',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,draft',
        ]);

        $path = $request->file('gambar')->store('menu', 'public');

        Menu::create([
            'id_user' => Auth::id(),
            'nama_menu' => $request->nama_menu,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'gambar' => $path,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ]);

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $menu = \App\Models\Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required|in:kopi tubruk,andalan sleko,basis espresso,seduh manual,bukan kopi,kudapan',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,draft',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {

            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil diupdate');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // hapus gambar kalau ada
        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil dihapus');
    }

}