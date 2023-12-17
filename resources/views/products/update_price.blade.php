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
    <h1 class="text-3xl font-bold mb-4">Update Product Price of {{$product->name}}</h1>

    <form action="{{ route('products.updatePrice', ['product' => $product]) }}" method="post" class="max-w-md">
        @csrf

        <label for="price" class="block text-sm font-medium text-gray-700">New Price:</label>
        <input type="number" name="price" step="0.01" required class="mt-1 p-2 border rounded w-full" value="{{ $product->price }}">

        <button type="submit" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">Update Price</button>
    </form>
@endsection

</body>
</html>
