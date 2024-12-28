<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\KaryawanController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/transactions/profit-report', function () {
//     return 'Profit Report route is working!';
// })->name('transaction.profit_report');


// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware(['auth', 'verified'])->name('dashboard.index');
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Halaman Edit Profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update Profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Hapus Akun


    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
    Route::post('/notifications/{index}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');


    // Dashboard controller
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Laporan keuangan
    Route::get('/laporankeuangan', [LaporanKeuanganController::class, 'index'])->name('laporan.keuangan');

    // Product routes
    Route::get('/products/deleted', [ProductController::class, 'deleted'])->name('products.deleted');
    Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::resource('products', ProductController::class);

    // Category routes
    Route::resource('categories', CategoryController::class);
    Route::resource('karyawan', KaryawanController::class);

    // Transaction routes
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/{transaction}/receipt', [TransactionController::class, 'printReceipt'])->name('receipt.print');
    Route::resource('transaction', TransactionController::class);
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');

    // Route::get('/transactions/profit-report', [TransactionController::class, 'profitReport'])->name('transaction.profit_report');

    Route::get('/profit-report', [TransactionController::class, 'profitReport'])->name('transaction.profit_report');

    // Discount routes
    // Rute Resource untuk Diskon
    Route::resource('discount', DiskonController::class);

    // Rute tambahan untuk Soft Deletes
    Route::put('discount/restore/{tema_diskon}', [DiskonController::class, 'restore'])->name('discount.restore');
    Route::delete('discount/force-delete/{tema_diskon}', [DiskonController::class, 'forceDelete'])->name('discount.forceDelete');
});

require __DIR__ . '/auth.php';
