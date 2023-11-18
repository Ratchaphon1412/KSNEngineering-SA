<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\product;
use App\Models\Team;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

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
        return redirect()->back();
    }

    public function showTeam() {
        $users = User::get();
        $teams = Team::get(); 
        return view('admin.team', [
            'users' =>$users,
            'teams' =>$teams,
        ]);
    }

    public function editTeam(User $user, Request $request) {
        $user = User::find($user->id);
        if( $request->selected == 0) {
            $user->team_id = null;
            $user->save();
            return redirect()->back();
        }
        $user->team_id = $request->selected;
        $user->save();

        return redirect()->back();
    }

    public Function createTeam(Request $request) {
        if(Team::where('name', $request->name)->first()){
            return back()->with('error', "Please choose another name, it's already taken.");
        }


        $team = new Team();
        $team->name = $request->name;
        $team->save();

        return redirect()->back();
    }



}
