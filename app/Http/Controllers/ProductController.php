<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Product::create($data);

        return redirect()->route('products.create')->with('success', 'Product added successfully');
    }


    public function showUpdatePriceForm(Product $product)
    {
        return view('products.update_price', compact('product'));
    }

    public function updatePrice(Request $request, Product $product)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $product->update(['price' => $request->input('price')]);

        return redirect()->route('products.index')->with('success', 'Product price updated successfully.');
    }


    public function sellForm(Product $product)
    {
        return view('products.sell', compact('product'));
    }

    public function sell(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity,
        ]);

        $totalAmount = $data['quantity'] * $product->price;

        $sale = Sale::create([
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
            'total_amount' => $totalAmount,
        ]);

        $product->decrement('quantity', $data['quantity']);

        return redirect()->route('products.index');
    }

    public function transactionHistory()
    {
        $transactions = Product::orderBy('created_at', 'desc')->get();

        return view('sales_history', compact('transactions'));
    }

}
