@extends('layouts.index')

@section('title', 'Laporan Keuntungan')

@section('content')
<div class="container mt-4">
    <h2>Laporan Keuntungan Produk</h2>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Keuntungan per Produk</th>
                <th>Total Keuntungan</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profitReport as $index => $report)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $report['name'] }}</td>
                <td>Rp {{ number_format($report['harga_beli'], 2, ',', '.') }}</td>
                <td>Rp {{ number_format($report['harga_jual'], 2, ',', '.') }}</td>
                <td>Rp {{ number_format($report['profit'], 2, ',', '.') }}</td>
                <td>Rp {{ number_format($report['total_profit'], 2, ',', '.') }}</td>
                <td>{{ $report['stock'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <a href="{{ route('transaction.index') }}" class="btn btn-primary">Kembali ke Transaksi</a>
    </div>
</div>
@endsection
