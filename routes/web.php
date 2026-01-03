<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Routes (Protected)
Route::middleware('auth')->group(function () {
    // User Dashboard
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    
    // Kendaraan Routes for Users
    Route::get('/kendaraan', [UserController::class, 'kendaraanIndex'])->name('kendaraan.index');
    Route::get('/kendaraan/{kendaraan}', [UserController::class, 'kendaraanShow'])->name('kendaraan.show');
    
    // Pemesanan Routes for Users
    Route::get('/pemesanan', [UserController::class, 'pemesananIndex'])->name('pemesanan.index');
    Route::get('/pemesanan/create/{kendaraan}', [UserController::class, 'pemesananCreate'])->name('pemesanan.create');
    Route::post('/pemesanan/store/{kendaraan}', [UserController::class, 'pemesananStore'])->name('pemesanan.store');
});

// Admin Routes (Protected - menggunakan middleware di controller)
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Kendaraan CRUD
    Route::get('/kendaraan', [AdminController::class, 'kendaraanIndex'])->name('kendaraan.index');
    Route::get('/kendaraan/create', [AdminController::class, 'kendaraanCreate'])->name('kendaraan.create');
    Route::post('/kendaraan', [AdminController::class, 'kendaraanStore'])->name('kendaraan.store');
    Route::get('/kendaraan/{kendaraan}/edit', [AdminController::class, 'kendaraanEdit'])->name('kendaraan.edit');
    Route::put('/kendaraan/{kendaraan}', [AdminController::class, 'kendaraanUpdate'])->name('kendaraan.update');
    Route::delete('/kendaraan/{kendaraan}', [AdminController::class, 'kendaraanDestroy'])->name('kendaraan.destroy');
    
    // Pemesanan Management
    Route::get('/pemesanan', [AdminController::class, 'pemesananIndex'])->name('pemesanan.index');
    Route::post('/pemesanan/{pemesanan}/status', [AdminController::class, 'pemesananUpdateStatus'])->name('pemesanan.update-status');
});