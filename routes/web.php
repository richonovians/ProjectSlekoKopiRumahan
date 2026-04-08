<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| PUBLIC (PENGUNJUNG)
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/menu', fn() => view('menu'))->name('menu');
Route::get('/gallery', fn() => view('gallery'))->name('gallery');
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
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        // menu
        Route::view('/menu', 'admin.menu')->name('menu');
        Route::view('/menu/create', 'admin.menu.create')->name('menu.create');

        // gallery
        Route::view('/gallery', 'admin.gallery')->name('gallery');
        Route::view('/gallery/create', 'admin.gallery.create')->name('gallery.create');

        // profile & settings
        Route::view('/profile', 'admin.profile')->name('profile');
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

        Route::view('/users', 'admin.users')->name('users');
        Route::view('/users/create', 'admin.users.create')->name('users.create');
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
