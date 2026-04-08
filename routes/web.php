<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROUTE SUPERADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Halaman Dashboard Utama Admin
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    // Kelola Menu
    Route::view('/menu', 'admin.menu')->name('menu');
    Route::view('/menu/create', 'admin.menu.create')->name('menu.create'); // Tambah Menu

    // Kelola Gallery
    Route::view('/gallery', 'admin.gallery')->name('gallery');
    Route::view('/gallery/create', 'admin.gallery.create')->name('gallery.create'); // Tambah Foto Galeri

    // Kelola Users/Admin
    Route::view('/users', 'admin.users')->name('users');
    Route::view('/users/create', 'admin.users.create')->name('users.create'); // Tambah Admin

    // Profil Admin
    Route::view('/profile', 'admin.profile')->name('profile');

    // Pengaturan
    Route::view('/settings', 'admin.settings')->name('settings');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
