<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function view(){
        $products = product::get();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function detail(product $product){
        $images = product::find($product->id)->image()->get();
        return view('kanban',[
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
}
