@extends('layouts.index')

@section('content')
    <div class="container">
        <h2>Edit Diskon</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('discount.update', $diskon->tema_diskon) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tema_diskon">Tema Diskon:</label>
                <input type="text" id="tema_diskon" name="tema_diskon" class="form-control"
                    value="{{ old('tema_diskon', $diskon->tema_diskon) }}" required>
                @error('tema_diskon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="persentase">Total Diskon (%):</label>
                <input type="number" id="persentase" name="persentase" class="form-control"
                    value="{{ old('persentase', $diskon->persentase) }}" min="1" max="100" required>
                @error('persentase')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="mulai">Waktu Mulai:</label>
                <input type="datetime-local" id="mulai" name="mulai" class="form-control"
                    value="{{ old('mulai', $diskon->mulai ? \Carbon\Carbon::parse($diskon->mulai)->format('Y-m-d\TH:i') : '') }}"
                    required>
                @error('mulai')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="berakhir">Waktu Selesai:</label>
                <input type="datetime-local" id="berakhir" name="berakhir" class="form-control"
                    value="{{ old('berakhir', $diskon->berakhir ? \Carbon\Carbon::parse($diskon->berakhir)->format('Y-m-d\TH:i') : '') }}"
                    required>
                @error('berakhir')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Diskon</button>
        </form>
    </div>
@endsection
