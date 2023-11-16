<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $users = collect();
        $users = User::where('name', '!=', 'admin')->paginate(5);
        $products = Product::paginate(10);
        // foreach($tmpusers as $user){
        //     if($user->roles->contains('name','user')){
        //         $users->push($user);
        //     }
        // }

        return view('admin.dashboard', [
            'users' => $users,
            'products' => $products
        ]);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
