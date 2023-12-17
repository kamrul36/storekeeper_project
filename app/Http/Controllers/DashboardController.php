<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todaySales = $this->getSalesForDate(now());
        $yesterdaySales = $this->getSalesForDate(now()->subDay());
        $thisMonthSales = $this->getSalesForMonth(now());
        $lastMonthSales = $this->getSalesForMonth(now()->subMonth());

        return view('dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    private function getSalesForDate($date)
    {
        return Sale::whereDate('created_at', $date->toDateString())->sum('total_amount');
    }

    private function getSalesForMonth($date)
    {
        return Sale::whereYear('created_at', $date->year)
            ->whereMonth('created_at', $date->month)
            ->sum('total_amount');
    }
}
