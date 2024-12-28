@extends('layouts.index')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Daftar Diskon Aktif</h2>
    <a href="{{ route('discount.create') }}" class="btn btn-primary mb-3">Tambah Diskon Baru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tema Diskon</th>
                <th>Persentase</th>
                <th>Mulai</th>
                <th>Berakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($diskonAktif as $index => $diskon)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $diskon->tema_diskon }}</td>
                    <td>{{ $diskon->persentase }}%</td>
                    <td>{{ $diskon->mulai }}</td>
                    <td>{{ $diskon->berakhir }}</td>
                    <td>
                        <a href="{{ route('discount.edit', $diskon->tema_diskon) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('discount.destroy', $diskon->tema_diskon) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada diskon aktif.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Diskon Terhapus</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tema Diskon</th>
                <th>Persentase</th>
                <th>Mulai</th>
                <th>Berakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($diskonTerhapus as $index => $diskon)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $diskon->tema_diskon }}</td>
                    <td>{{ $diskon->persentase }}%</td>
                    <td>{{ $diskon->mulai }}</td>
                    <td>{{ $diskon->berakhir }}</td>
                    <td>
                        <form action="{{ route('discount.restore', $diskon->tema_diskon) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm">Pulihkan</button>
                        </form>
                        <form action="{{ route('discount.forceDelete', $diskon->tema_diskon) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus permanen?')">Hapus Permanen</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada diskon terhapus.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
