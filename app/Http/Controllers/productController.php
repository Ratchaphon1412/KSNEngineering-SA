<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Repair;

class ProductController extends Controller
{
    public function view()
    {
        $products = product::get();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function detail(product $product)
    {
        $images = product::find($product->id)->image()->get();
        return view('kanban', [
            'product' => $product,
            'images' => $images
        ]);
    }

    public function createCrane()
    {
        return view('product.create-crane');
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
