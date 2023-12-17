<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product form</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')

    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Add a new product</h2>
        @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ url('/products') }}" method="post" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-600">Product Name:</label>
                <input type="text" name="name" class="form-input mt-1 h-fit block w-full" required>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-600">Quantity:</label>
                <input type="number" name="quantity" class="form-input mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-600">Price:</label>
                <input type="number" name="price" step="0.01" class="form-input mt-1 block w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
        </form>
    </div>
    @endsection
</body>

</html>