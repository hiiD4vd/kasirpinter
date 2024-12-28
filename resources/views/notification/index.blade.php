@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Notifikasi</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Periksa apakah $notifications adalah array dan tidak kosong -->
        @if (is_array($notifications) && !empty($notifications))
            <ul class="list-group">
                @foreach ($notifications as $index => $notification)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $notification['message'] }}
                        @if (!$notification['is_read'])
                            <form action="{{ route('notification.markAsRead', $index) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Tandai sebagai dibaca</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Dibaca</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada notifikasi.</p>
        @endif

        <!-- Form untuk menambahkan notifikasi baru -->
        <form action="{{ route('notification.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Notifikasi Baru</label>
                <input type="text" name="message" id="message" class="form-control" placeholder="Tulis pesan notifikasi">
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan Notifikasi</button>
        </form>
    </div>
@endsection
