<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{

    public function index()
    {

        $products = DB::table('products')->get();
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

        DB::table('products')->insert([
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);


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

        DB::table('products')->where('id', $product->id)->update(['price' => $request->input('price')]);

        return redirect()->route('products.index')->with('success', 'Product price updated successfully.');

    }


    public function sellForm(Product $product)
    {
        return view('products.sell', compact('product'));
    }

    public function sell($productId, Request $request)
    {

        $product = DB::table('products')->where('id', $productId)->first();

        $requestedQuantity = $request->input('quantity');

        if ($product->quantity >= $requestedQuantity) {
            $totalAmount = $requestedQuantity * $product->price; // Adjust based on your product price
            $newQuantity = $product->quantity - $requestedQuantity;


            DB::table('products')->where('id', $productId)->update(['quantity' => $newQuantity]);

            DB::table('sales')->insert([
                'product_id' => $productId,
                'quantity' => $requestedQuantity,
                'total_amount' => $totalAmount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('products.index');
    }

    public function transactionHistory()
    {
        $transactions = DB::table('sales')
        ->join('products', 'sales.product_id', '=', 'products.id')
        ->select('sales.*', 'products.name as product_name')
        ->orderBy('sales.created_at', 'desc')
        ->get();
        
        return view('sales_history', compact('transactions'));
    }

}
