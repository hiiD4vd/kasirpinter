@extends('layouts.index')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Diskon Baru</h2>
        <form action="{{ route('discount.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tema_diskon" class="form-label">Tema Diskon</label>
                <input type="text" name="tema_diskon" id="tema_diskon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="persentase" class="form-label">Persentase Diskon</label>
                <input type="number" name="persentase" id="persentase" class="form-control" min="1" max="100" required>
            </div>
            <div class="mb-3">
                <label for="mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" name="mulai" id="mulai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="berakhir" class="form-label">Tanggal Berakhir</label>
                <input type="date" name="berakhir" id="berakhir" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('discount.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
