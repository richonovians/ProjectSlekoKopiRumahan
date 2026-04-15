<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        // ambil menu minuman (aktif saja)
        $drinks = \App\Models\Menu::where('status', 'aktif')
            ->where('jenis', 'minuman')
            ->latest()
            ->get();

        // ambil menu makanan (aktif saja)
        $foods = \App\Models\Menu::where('status', 'aktif')
            ->where('jenis', 'makanan')
            ->latest()
            ->get();

        return view('menu', compact('drinks', 'foods'));
    }
}