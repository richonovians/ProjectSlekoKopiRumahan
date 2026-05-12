<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $kopiTubruk = Menu::where('status', 'aktif')
            ->where('jenis', 'kopi tubruk')
            ->latest()
            ->get();

        $andalanSleko = Menu::where('status', 'aktif')
            ->where('jenis', 'andalan sleko')
            ->latest()
            ->get();

        $espresso = Menu::where('status', 'aktif')
            ->where('jenis', 'basis espresso')
            ->latest()
            ->get();

        $seduhManual = Menu::where('status', 'aktif')
            ->where('jenis', 'seduh manual')
            ->latest()
            ->get();

        $nonKopi = Menu::where('status', 'aktif')
            ->where('jenis', 'bukan kopi')
            ->latest()
            ->get();

        $kudapan = Menu::where('status', 'aktif')
            ->where('jenis', 'kudapan')
            ->latest()
            ->get();

        return view('menu', compact(
            'kopiTubruk',
            'andalanSleko',
            'espresso',
            'seduhManual',
            'nonKopi',
            'kudapan'
        ));
    }
}