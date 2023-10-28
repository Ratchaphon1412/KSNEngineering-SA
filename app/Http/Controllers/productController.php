<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productImage;

class productController extends Controller
{
    public function view()
    {
        return view('product.index');
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
