<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Category;
use App\Models\LaporanKeuangan;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalKeuntungan = LaporanKeuangan::sum('laba_bersih');
        $user = Auth::user(); // Mengambil user login

        // dd($user); // Untuk debug, akan melihat apa yang dikembalikan oleh auth()

        return view('dashboard.index', compact('totalProducts', 'totalTransactions', 'totalKeuntungan', 'user'));
    }
}
