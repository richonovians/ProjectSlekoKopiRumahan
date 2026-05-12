<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\MenuController as AdminMenu;
use App\Models\Menu;
use App\Models\Gallery;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\Admin\GalleryController as AdminGallery;

/*
|--------------------------------------------------------------------------
| PUBLIC (PENGUNJUNG)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $featuredMenus = Menu::where('status', 'aktif')
        ->where('is_featured', 1)
        ->latest()
        ->take(4)
        ->get();

    return view('home', compact('featuredMenus'));
})->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/gallery', function (\Illuminate\Http\Request $request) {
    // 1. Ambil data galeri yang statusnya 'aktif'
    $query = \App\Models\Gallery::where('status', 'aktif')->latest('id_galeri');

    // 2. Jika pengunjung mengklik tombol kategori (kecuali 'all')
    if ($request->filled('kategori') && $request->kategori !== 'all') {
        $query->where('kategori', $request->kategori);
    }

    // 3. Batasi hanya 12 foto per halaman agar loading super cepat
    $galleries = $query->paginate(12);

    return view('gallery', compact('galleries'));
})->name('gallery');
Route::get('/contact', fn() => view('contact'))->name('contact');


/*
|--------------------------------------------------------------------------
| ADMIN & SUPERADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // menu (PERBAIKI DI SINI)
        Route::get('/menu', [AdminMenu::class, 'index'])->name('menu');
        Route::get('/menu/create', [AdminMenu::class, 'create'])->name('menu.create');
        Route::post('/menu/store', [AdminMenu::class, 'store'])->name('menu.store');

        Route::get('/menu/{id}/edit', [AdminMenu::class, 'edit'])->name('menu.edit');
        Route::put('/menu/{id}', [AdminMenu::class, 'update'])->name('menu.update');

        Route::delete('/menu/{id}', [AdminMenu::class, 'destroy'])->name('menu.destroy');

        // gallery
        Route::get('/gallery', [AdminGallery::class, 'index'])->name('gallery');
        Route::get('/gallery/create', [AdminGallery::class, 'create'])->name('gallery.create');
        Route::post('/gallery/store', [AdminGallery::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{id}/edit', [AdminGallery::class, 'edit'])->name('gallery.edit');
        Route::put('/gallery/{id}', [AdminGallery::class, 'update'])->name('gallery.update');
        Route::delete('/gallery/{id}', [AdminGallery::class, 'destroy'])->name('gallery.destroy');

        // profile & settings
        Route::view('/profile', 'admin.profile')->name('profile');
        Route::patch('/profile', [AdminProfile::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [AdminProfile::class, 'updatePassword'])->name('profile.password');
        Route::view('/settings', 'admin.settings')->name('settings');
});


/*
|--------------------------------------------------------------------------
| KHUSUS SUPERADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:superadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/users', [UserController::class, 'index'])->name('users');
        // Menampilkan form tambah admin (DIPERBARUI)
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        
        // Memproses data dari form tambah admin ke database (DITAMBAHKAN)
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

        // Rute untuk menampilkan halaman Form Edit
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    
        // Rute untuk memproses data dari Form Edit ke Database
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});


/*
|--------------------------------------------------------------------------
| PROFILE (DEFAULT BREEZE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
