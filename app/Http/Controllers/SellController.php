<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellController extends Controller
{
    //

    public function repairView(Request $request)
    {


        return view('seller.repair');
    }
}
