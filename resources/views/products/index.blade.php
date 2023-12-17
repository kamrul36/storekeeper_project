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
    <h1 class="text-3xl font-bold mb-4">Product List</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Price</th>
                <th class="py-2 px-4 border-b">Update Price</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="py-2 px-4 border-b text-center">{{ $product->name }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $product->quantity }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $product->price }}</td>
                <td class="py-2 px-4 border-b text-center">
                <a href="{{ route('products.showUpdateForm', ['product' => $product]) }}" class="text-blue-500 ml-2">Update Price</a>
                </td>
                <td class="py-2 px-4 border-b text-center">
                    <a href="{{ route('products.sellForm', ['product' => $product]) }}" class="text-blue-500">Sell</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">Add
        Product</a>
    @endsection
</body>

</html>