<?php

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\PenggunaController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\SupplierController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\TransactionController;
// use App\Http\Controllers\TransactionDetailController;
// use App\Http\Controllers\DiskonController;
// use App\Http\Controllers\KaryawanController;
// use App\Http\Controllers\LaporanKeuanganController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\JenisPenggunaController;

// Route::prefix('v1')->group(function () {

//     Route::apiResource('/diskons', DiskonController::class);
//     // Endpoint for Products
//     Route::apiResource('/products', ProductController::class);

//     // Endpoint for suppliers
//     // Route::apiResource('/suppliers', SupplierController::class);

//     // Endpoint for categories
//     Route::apiResource('/categories', CategoryController::class);

//     // Endpoint for transactions
//     Route::apiResource('/transactions', TransactionController::class);

//     // Endpoint for transaction details
//     Route::apiResource('/transaction-details', TransactionController::class);

//     // Endpoint for diskon
   

//     // Endpoint for karyawan
//     Route::apiResource('/karyawan', KaryawanController::class);

//     // Endpoint for laporan keuangan
//     Route::apiResource('/laporan-keuangan', LaporanKeuanganController::class);

//     // Routes for authentication
//     Route::controller(AuthController::class)->group(function () {
//         Route::post('register', 'register');
//         Route::post('login', 'login');
//         Route::post('/logout', 'logout')->middleware('auth:sanctum');
//     });

//     // Protected routes with auth:sanctum middleware
//     Route::middleware('auth:sanctum')->group(function () {
//         // Endpoint for penggunas and jenis
//         Route::apiResource('/penggunas', PenggunaController::class);
//         Route::patch('/penggunas/{pengguna}/jenis', JenisPenggunaController::class);

        
//     });
// });
