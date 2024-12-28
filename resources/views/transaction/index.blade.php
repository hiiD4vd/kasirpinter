@extends('layouts.index')

@section('content')
    <h1>Transaction List</h1>
    <a href="{{ route('transaction.create') }}" class="btn btn-primary">Create Transaction</a>
    <table class="table">
        <thead>
            <tr>
                {{-- <th>User</th> --}}
                <th>Total</th>
                <th>Transaction Date</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    {{-- <td>{{ $transaction->nama }}</td> --}}
                    <td>{{ $transaction->total }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                    <td>{{ $transaction->tema_diskon ?? 'No Discount' }}</td>
                    <td>
                        <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
