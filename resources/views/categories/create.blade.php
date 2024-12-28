@extends('layouts.index')

@section('content')
    <h1>Add Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
