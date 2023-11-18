<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Service\Payments\Omise;
use App\Models\Payment;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $users = collect();
        $users = User::where('name', '!=', 'admin')->paginate(5);
        $count_users = User::where('name', '!=', 'admin')->count();
        $products = Product::paginate(10);
        $count_products = Product::count();
        $payments = Omise::AdminBalance();
        $payments = $payments->toArray();

        $transections = Payment::paginate(15);



        // foreach($tmpusers as $user){
        //     if($user->roles->contains('name','user')){
        //         $users->push($user);
        //     }
        // }

        return view('admin.dashboard', [
            'count_users' => $count_users,
            'count_products' => $count_products,
            'payments' => $payments['total'] / 100,
            'users' => $users,
            'products' => $products,
            'transections' => $transections,
        ]);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
