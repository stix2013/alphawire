<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(10); // Fetch latest products, paginated
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id); // Find product by ID or fail (404)
        return view('products.show', compact('product'));
    }
}
