<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;

class AdminController extends Controller
{
    public function dashboard(){
        // $users = collect();
        $users = User::where('name' , '!=', 'admin')->paginate(5);
        $products = product::paginate(10);
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

    public function deleteProduct(product $product){
        $product->delete();
        return $this->dashboard();
    }
}
