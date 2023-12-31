<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Sale Transaction History</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Product</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Total Amount</th>
                <th class="py-2 px-4 border-b">Created Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $transaction->product_name }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $transaction->quantity }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $transaction->total_amount }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $transaction->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>
