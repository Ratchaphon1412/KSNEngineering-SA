<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;


class ProductController extends Controller
{
    public function index(){
        $products = product::get();

        return view('product', [
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
}
