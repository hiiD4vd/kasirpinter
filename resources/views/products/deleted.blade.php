@extends('layouts.index')

@section('content')
    <h1>Produk yang Terhapus</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Pemasok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->nama ?? 'N/A' }}</td>
                    <td>{{ $product->supplier->nama ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Pulihkan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
@endsection
