@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Product List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('products.deleted') }}" class="btn btn-secondary mb-3">Lihat Produk Terhapus</a>

        <form method="GET" action="{{ route('products.index') }}" class="mb-4">
            <div class="row">
                <!-- Input Pencarian -->
                <div class="col-md-3">
                    <label for="search">Cari Produk</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari produk..."
                        value="{{ request('search') }}">
                </div>

                <!-- Filter Kategori -->
                <div class="col-md-3">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ isset($filters['category_id']) && $filters['category_id'] == $category->id ? 'selected' : '' }}>
                                {{ $category->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Harga -->
                <div class="col-md-3">
                    <label for="min_price">Harga Minimum</label>
                    <input type="number" name="min_price" id="min_price" class="form-control"
                        value="{{ $filters['min_price'] ?? '' }}">
                </div>
                <div class="col-md-3">
                    <label for="max_price">Harga Maksimum</label>
                    <input type="number" name="max_price" id="max_price" class="form-control"
                        value="{{ $filters['max_price'] ?? '' }}">
                </div>
            </div>

            <!-- Tombol Filter -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <!-- Tabel Produk -->
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            @if ($product->photo)
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" width="100">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->nama ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
