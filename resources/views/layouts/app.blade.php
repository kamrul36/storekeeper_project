<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Keeper</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-semibold">Store Keeper</h1>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <!-- <nav>
    <ul>
    
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
</nav> -->
</body>

</html> 