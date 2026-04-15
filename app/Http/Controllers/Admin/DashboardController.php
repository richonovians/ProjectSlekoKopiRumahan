<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Gallery; 
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data dari masing-masing tabel
        $totalMenu = Menu::count();
        $totalGallery = Gallery::count(); // Sesuaikan dengan model galeri Anda
        $totalAdmin = User::count(); // Sesuaikan dengan model admin Anda

        // Mengambil 4 data admin terbaru untuk ditampilkan di list "Admin Terdaftar"
        $admins = User::latest()->take(4)->get();

        // Mengirimkan variabel ke view
        return view('admin.dashboard', compact(
            'totalMenu', 
            'totalGallery', 
            'totalAdmin', 
            'admins'
        ));
    }
}