<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Keeper</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <header class="bg-blue-800 p-4 text-white flex justify-between">
        <div>
            <span class="text-lg font-bold">Storekeeper</span>
        </div>

        <nav>
            <ul class="flex space-x-4">
                <!-- Add other navigation links if needed -->   
                <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('products') }}" class="hover:underline">Products</a></li>
                <li><a href="{{ route('transactionHistory') }}" class="hover:underline">Transaction History</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>