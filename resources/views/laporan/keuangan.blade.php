@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Daftar Laporan Keuangan</h1>
        {{-- <a href="{{ route('laporan-keuangan.create') }}" class="btn btn-primary mb-3">Tambah Laporan</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total Pendapatan</th>
                    <th>Total Pengeluaran</th>
                    <th>Laba Bersih</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>Rp {{ number_format($item->total_pendapatan, 2) }}</td>
                        <td>Rp {{ number_format($item->total_pengeluaran, 2) }}</td>
                        <td>Rp {{ number_format($item->laba_bersih, 2) }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>
                            {{-- <a href="{{ route('laporan-keuangan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('laporan-keuangan.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
