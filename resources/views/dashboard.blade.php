<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @extends('layouts.index')

    @section('title', 'Dashboard')

    @section('content')
        <div class="container">
            <h1 class="mb-4">Dashboard</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Produk</h5>
                            <p>{{ $totalProducts }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Transaksi</h5>
                            <p>{{ $totalTransactions }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Laporan Keuntungan</h5>
                            <p>{{ number_format($totalKeuntungan, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


</x-app-layout>
