@extends('layouts.index')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="photo">Foto Produk:</label>
                @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" width="100" class="mb-3">
                @endif
                <input type="file" id="photo" name="photo" class="form-control">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stok:</label>
                <input type="number" id="stock" name="stock" class="form-control"
                    value="{{ old('stock', $product->stock) }}" required>
                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" id="price" name="price" class="form-control"
                    value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" step="0.01" class="form-control" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $product->harga_beli) }}" required>
            </div>
            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" step="0.01" class="form-control" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $product->harga_jual) }}" required>
            </div>
            
            <div class="form-group">
                <label for="category_id" class="form-label">Kategori:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Produk</button>
        </form>
    </div>
@endsection
