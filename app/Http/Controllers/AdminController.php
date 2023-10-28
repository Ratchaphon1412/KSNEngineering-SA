<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $user = User::get();
        return view('admin.dashboard', [
            'users' => $user 
        ]);
    }
}
