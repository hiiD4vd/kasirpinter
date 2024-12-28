@extends('layouts.index')

@section('title', 'Profil user')

@section('content')
<div class="container mt-4">
    <h2>Profil Pengguna</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') <!-- Sesuai metode PATCH -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $user->telepon }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $user->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="foto_profil" class="form-label">Foto Profil</label>
            <input type="file" class="form-control" id="foto_profil" name="foto_profil">
            @if($user->foto_profil)
                <img id="preview-foto" src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" class="img-thumbnail mt-2" width="150">
            @else
                <img id="preview-foto" src="https://via.placeholder.com/150" alt="Foto Profil" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        
        
        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>

    <!-- Tombol Hapus Akun -->
    <form action="{{ route('profile.destroy') }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus akun?')">Hapus Akun</button>
    </form>
</div>
@endsection
