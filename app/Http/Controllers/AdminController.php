<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Service\Payments\Omise;
use App\Models\Payment;
use App\Models\Team;
use Illuminate\Http\Request;


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

    public function showTeam()
    {
        $users = User::get();
        $teams = Team::get();
        return view('admin.team', [
            'users' => $users,
            'teams' => $teams,
        ]);
    }

    public function editTeam(User $user, Request $request)
    {
        $user = User::find($user->id);
        if ($request->selected == 0) {
            $user->team_id = null;
            $user->save();
            return redirect()->back();
        }
        $user->team_id = $request->selected;
        $user->save();

        return redirect()->back();
    }

    public function createTeam(Request $request)
    {
        if (Team::where('name', $request->name)->first()) {
            return back()->with('error', "Please choose another name, it's already taken.");
        }


        $team = new Team();
        $team->name = $request->name;
        $team->save();

        return redirect()->back();
    }
}
