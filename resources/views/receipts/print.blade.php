@extends('layouts.index')

@section('content')
    <h1>Resi Transaksi</h1>
    <p>Kode Resi: {{ $receipt->receipt_code }}</p>
    <p>Waktu Cetak: {{ $receipt->printed_at }}</p>
    <p>Total Transaksi: {{ $transaction->total }}</p>

    <button onclick="window.print()">Cetak Resi</button>
    <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Kembali ke Daftar Transaksi</a>

@endsection
