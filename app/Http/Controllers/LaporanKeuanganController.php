<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = LaporanKeuangan::all();
        return view('laporan.keuangan', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('laporan.keuangan');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'total_pendapatan' => 'required|numeric',
    //         'total_pengeluaran' => 'required|numeric',
    //         'laba_bersih' => 'required|numeric',
    //         'tanggal' => 'required|date',
    //     ]);

    //     LaporanKeuangan::create($request->all());
    //     return redirect()->route('laporan.keuangan')->with('success', 'Laporan berhasil ditambahkan.');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(LaporanKeuangan $laporanKeuangan)
    // {
    //     return view('laporan_keuangan.show', compact('laporanKeuangan'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(LaporanKeuangan $laporanKeuangan)
    // {
    //     return view('laporan_keuangan.edit', compact('laporanKeuangan'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, LaporanKeuangan $laporanKeuangan)
    // {
    //     $request->validate([
    //         'total_pendapatan' => 'required|numeric',
    //         'total_pengeluaran' => 'required|numeric',
    //         'laba_bersih' => 'required|numeric',
    //         'tanggal' => 'required|date',
    //     ]);

    //     $laporanKeuangan->update($request->all());
    //     return redirect()->route('laporan.keuangan')->with('success', 'Laporan berhasil diperbarui.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(LaporanKeuangan $laporanKeuangan)
    // {
    //     $laporanKeuangan->delete();
    //     return redirect()->route('laporan.keuangan')->with('success', 'Laporan berhasil dihapus.');
    // }
}
