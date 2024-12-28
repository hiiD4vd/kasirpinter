<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\LaporanKeuangan;
use Illuminate\Support\Facades\Log;


class AuthenticatedSessionController extends Controller
{


    /**
     * Display the login view.
     */
    public function create(): View
    {


        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{

    Log::info('Login attempt', ['email' => $request->email]);

    try {

        $request->authenticate();

        $request->session()->regenerate();

        Log::info('User logged in successfully', [
            'user_id' => Auth::id(),
            'email' => Auth::user()->email,
            'timestamp' => now(),
        ]);

 
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalKeuntungan = LaporanKeuangan::sum('laba_bersih');

  
        return redirect()->intended(route('dashboard.index'))
            ->with([
                'totalProducts' => $totalProducts,
                'totalTransactions' => $totalTransactions,
                'totalKeuntungan' => $totalKeuntungan,
            ]);
    } catch (\Exception $e) {

        Log::warning('Login failed', [
            'email' => $request->email,
            'timestamp' => now(),
            'error' => $e->getMessage(),
        ]);

        return redirect()->route('login')->withErrors([
            'email' => 'Login gagal. Pastikan email dan password benar.',
        ]);
    }

    
    // return redirect()->route('login');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Log::info('User logged out successfully', [
            'timestamp' => now(),
        ]);

        return redirect('/');
    }
}
