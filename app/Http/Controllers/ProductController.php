<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Repair;

class ProductController extends Controller
{
    public function view()
    {
        $products = Product::get();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function detail(Product $product)
    {
        $images = Product::find($product->id)->image()->get();
        return view('kanban', [
            'product' => $product,
            'images' => $images
        ]);
    }

    public function createCrane(Repair $repair)
    {
        return view('product.create-crane', compact('repair'));
    }
    public function createProduct()
    {
        return view('product.create-product');
    }
    public function createQuotation(Repair $repair)
    {

        return view('product.create-quotation', compact('repair'));
    }
}
