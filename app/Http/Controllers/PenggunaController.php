<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function showProfile()
    {
        $pengguna = Auth::user(); 
        return view('profile.index', compact('pengguna'));
    }

    public function updateProfile(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email|unique:pengguna,email,' . Auth::id(),
        'telepon' => 'nullable|string|max:15',
        'alamat' => 'nullable|string',
        'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    
    $pengguna = Auth::user();

    
    if (!$pengguna) {
        return redirect()->back()->withErrors('Pengguna tidak ditemukan.');
    }

   
    $data = $request->only('nama', 'email', 'telepon', 'alamat');

    if ($request->hasFile('foto_profil')) {
      
        if ($pengguna->foto_profil && Storage::exists($pengguna->foto_profil)) {
            Storage::delete($pengguna->foto_profil);
        }

        $path = $request->file('foto_profil')->store('foto_profil', 'public');
        $data['foto_profil'] = $path;
    }
    dd($pengguna);

    $pengguna->update($data);



    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
}

}
