@extends('layouts.index')

@section('content')
    <div class="container">
        <h2>Detail Transaksi</h2>

        {{-- Informasi Transaksi Utama --}}
        <div class="card mt-4">
            <div class="card-body">
                <h5>Informasi Transaksi</h5>
                <p><strong>ID Transaksi:</strong> {{ $transaction->id }}</p>
                <p><strong>Tanggal:</strong> {{ $transaction->transaction_date }}</p>
                <p><strong>Total:</strong> Rp{{ number_format($transaction->total, 0, ',', '.') }}</p>
                <p><strong>Kasir:</strong> {{ $transaction->user ? $transaction->user->name : 'Umum' }}</p>

                <p><strong>Diskon:</strong> {{ $transaction->tema_diskon ?? 'Tidak Ada' }}</p>

                </p>
            </div>
        </div>

        {{-- Tabel Detail Barang --}}
        <div class="card mt-4">
            <div class="card-body">
                <h5>Detail Barang</h5>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Nama Barang</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Total sebelum Diskon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction->details as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>Rp{{ number_format($detail->price, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
