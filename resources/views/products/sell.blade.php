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
    <h1 class="text-3xl font-bold mb-4">Sell Product: {{ $product->name }}, Quantity: {{$product->quantity}}</h1>

    <form action="{{ route('products.sell', ['product' => $product]) }}" method="post" class="max-w-md">
        @csrf
        <label for="quantity" class="block mt-2 text-sm font-medium text-gray-700">Quantity to Sell:</label>
        <input type="number" name="quantity" required class="mt-1 p-2 border rounded w-full">

        <button type="submit" class="mt-4 inline-block bg-red-500 text-white py-2 px-4 rounded">Sell Product</button>
    </form>
@endsection
    
</body>
</html>