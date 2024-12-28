<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    public function index()
    {
        $diskonAktif = Diskon::all();
        $diskonTerhapus = Diskon::onlyTrashed()->get();

        return view('discount.index', compact('diskonAktif', 'diskonTerhapus'));
    }

    public function create()
    {
        return view('discount.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema_diskon' => 'required|string|unique:diskon,tema_diskon',
            'persentase' => 'required|numeric|min:1|max:100',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after:mulai',
        ]);

        Diskon::create($request->only('tema_diskon', 'persentase', 'mulai', 'berakhir'));

        return redirect()->route('discount.index')->with('success', 'Diskon berhasil dibuat.');
    }

    public function edit($tema_diskon)
    {
        $diskon = Diskon::findOrFail($tema_diskon);
        return view('discount.edit', compact('diskon'));
    }

    public function update(Request $request, $tema_diskon)
    {
        $diskon = Diskon::findOrFail($tema_diskon);

        $request->validate([
            'persentase' => 'required|numeric|min:1|max:100',
            'mulai' => 'required|date',
            'berakhir' => 'required|date|after:mulai',
        ]);

        $diskon->update($request->only('persentase', 'mulai', 'berakhir'));

        return redirect()->route('discount.index')->with('success', 'Diskon berhasil diperbarui.');
    }

    public function destroy($tema_diskon)
    {
        $diskon = Diskon::findOrFail($tema_diskon);
        $diskon->delete();

        return redirect()->route('discount.index')->with('success', 'Diskon berhasil dihapus.');
    }

    public function restore($tema_diskon)
    {
        $diskon = Diskon::onlyTrashed()->where('tema_diskon', $tema_diskon)->firstOrFail();
        $diskon->restore();

        return redirect()->route('discount.index')->with('success', 'Diskon berhasil dipulihkan.');
    }

    public function forceDelete($tema_diskon)
    {
        $diskon = Diskon::onlyTrashed()->where('tema_diskon', $tema_diskon)->firstOrFail();
        $diskon->forceDelete();

        return redirect()->route('discount.index')->with('success', 'Diskon berhasil dihapus permanen.');
    }
}
