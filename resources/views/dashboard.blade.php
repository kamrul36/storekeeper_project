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
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-blue-200 p-4 rounded">
            <h2 class="text-xl font-bold mb-2">Today's Sales</h2>
            <p class="text-2xl">${{ number_format($todaySales, 2) }}</p>
        </div>

        <div class="bg-green-200 p-4 rounded">
            <h2 class="text-xl font-bold mb-2">Yesterday's Sales</h2>
            <p class="text-2xl">${{ number_format($yesterdaySales, 2) }}</p>
        </div>

        <div class="bg-yellow-200 p-4 rounded">
            <h2 class="text-xl font-bold mb-2">This Month's Sales</h2>
            <p class="text-2xl">${{ number_format($thisMonthSales, 2) }}</p>
        </div>

        <div class="bg-red-200 p-4 rounded">
            <h2 class="text-xl font-bold mb-2">Last Month's Sales</h2>
            <p class="text-2xl">${{ number_format($lastMonthSales, 2) }}</p>
        </div>
    </div>
@endsection

</body>
</html>
